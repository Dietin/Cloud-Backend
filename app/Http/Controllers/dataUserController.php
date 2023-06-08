<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class dataUserController extends Controller
{
    public function updateDataUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Update the user data
        $updated = $user->dataUser()->update([
            'age' => $request->input('age'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'bmr' => $request->input('bmr'),
            'activity_level' => $request->input('activity_level'),
            'gender' => $request->input('gender'),
            'idealCalories' => $request->input('idealCalories')
            
        ]);
        
        if ($updated) {
            return response([
            'message' => 'Update Data User Success',
            'data' => $updated
        ], 200);
        } else {
            return response([
            'message' => 'Update Data User Failed',
            'data' => null
        ], 400);
        }
    }
}
