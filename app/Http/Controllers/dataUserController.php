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
                'data' => $dataUser
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); 
    }

    public function store(Request $request, $user_id){
        $user = User::find($user_id);

        if (!$user) {
            return response([
                'status' => 'error',
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

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

        $dataUser = new dataUser();
        $dataUser->age = $request->input('age');
        $dataUser->weight = $request->input('weight');
        $dataUser->height = $request->input('height');
        $dataUser->bmr = $request->input('bmr');
        $dataUser->activity_level = $request->input('activity_level');
        $dataUser->gender = $request->input('gender');
        $dataUser->user_id = $user->id;

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
