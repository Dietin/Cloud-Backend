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
            'bmr' => 'required',
            'activity_level' => 'required',
            'gender' => 'required'
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
        // $dataUser->bmr = $dataUser->height + $dataUser->weight;
        $dataUser->bmr = $request->input('bmr');
        $dataUser->activity_level = $request->input('activity_level');
        $dataUser->gender = $request->input('gender');
        $dataUser->user_id = $user;

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
