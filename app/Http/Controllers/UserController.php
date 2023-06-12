<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $user = User::all();

        if(count($user) > 0){
            return response([
    
                'data' => $user
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); 
    }
    public function update(Request $request){
        $id = $request->user()->id;

        $updateData = $request->all();
        $updateData['id'] = $id;
        $validate = Validator::make($updateData, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        if($validate->fails())
            return response(['message' => $validate->errors()], 400);
            
        $user = User::find($id);
        $user->name = $updateData['name'];
        $user->email = $updateData['email'];

        if($user->save()){
            return response([
                'message' => 'Update User Success',
                'data' => $user
            ], 200);
        }

        return response([
            'message' => 'Update User Failed',
            'data' => null
        ], 400);
    }
}
