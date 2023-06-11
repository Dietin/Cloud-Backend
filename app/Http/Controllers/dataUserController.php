<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\dataUser;
use Illuminate\Support\Facades\Validator;

class dataUserController extends Controller
{
    
    public function index(){
        $dataUser = dataUser::with('User')->get();

        if(count($dataUser) > 0){
            return response([
                'message' => 'Retrieve all User Success',
                'data' => $dataUser
            ], 200);
        }
    }

    public function store(Request $request){
        $user = $request->user()->id;

        $validator = Validator::make($request->all(), [
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'activity_level' => 'required|integer|between:1,5',
            'gender' => 'required',
            'current_weight' => 'required',
            'diet_objective' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 'error',
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 400);
        }

        $dataUser = dataUser::where('user_id', $user)->first();
        if($dataUser==null){
            $dataUser = new dataUser();
        }
        $dataUser->age = $request->input('age');
        $dataUser->weight = $request->input('weight');
        $dataUser->height = $request->input('height');
        // $dataUser->bmr = $request->input('bmr');
        $dataUser->gender = $request->input('gender');
        $dataUser->bmi = $request->input('weight')/(($request->input('height')/100)*($request->input('height')/100));
        $dataUser->user_id = $user;
        $dataUser->diet_objective = $request->input('diet_objective');
        $dataUser->current_weight = $request->input('current_weight');

        $activityLevel = $request->input('activity_level');
        if ($activityLevel == 1) {
            $dataUser->activity_level = 1.2;
        } elseif ($activityLevel == 2) {
            $dataUser->activity_level = 1.375;
        } elseif ($activityLevel == 3) {
            $dataUser->activity_level = 1.55;
        } elseif ($activityLevel == 4) {
            $dataUser->activity_level = 1.725;
        } elseif ($activityLevel == 5) {
            $dataUser->activity_level = 1.9;
        } else {
            // Default value if activity_level is not within the specified range
            $dataUser->activity_level = 1;
        }

        if ($dataUser->gender == 0) {
            $dataUser->bmr = 655.1 + (9.563 * $dataUser->weight) + (1.850 * $dataUser->height) - (4.676 * $dataUser->age);
        } else {
            $dataUser->bmr = 66.47 + (13.75 * $dataUser->weight) + (5.003 * $dataUser->height) - (6.755 * $dataUser->age);
        }

        if ($dataUser->save()) {
            return response([
                'message' => 'Add dataUser Success',
                'data' => $dataUser
            ], 200);
        } else {
            return response([
                'message' => 'Add dataUser failed',
                'data' => null
            ], 400);
        }
    }
}
