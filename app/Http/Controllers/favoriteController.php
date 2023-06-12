<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\recipe;
use App\Models\category;


class favoriteController extends Controller
{
    public function index(Request $request){
        $id = $request->user()->id;
        $favorite = favorite::where('user_id', $id)->with('recipe', 'category')->get();

            return response([
                'message' => 'Retrieve Favorite Success',
                'data' => $favorite
            ], 200);

    }


    public function store(Request $request){
        $storeData = $request->all();
        $storeData['user_id'] = $request->user()->id;
        $validate = Validator::make($storeData, [
            'recipe_id' => 'required',
            'user_id' => 'required',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()->first(),'errors' => $validate->errors()], 400);

        $favorite = favorite::create($storeData);
        return response([
            'message' => 'Retrieve Favorite Success',
            'data' => $favorite
        ], 200);
    }

    
    public function destroyAll(Request $request){
        $id = $request->user()->id;

        $favorite = favorite::where('user_id', $id)->delete();
        if ($favorite) {
            return response([
                'message' => 'Delete all Favorite Success',
                'data' => $favorite
            ], 200);
        }
    }

    public function destroy($recipe_id){
        $favorite = favorite::find($recipe_id);
        
        if(is_null($favorite)){
            return response([
                'message' => 'Food History Not Found',
                'data' => null
            ], 404);
        }

        if($favorite->delete()){
            return response([
                'message' => 'Delete Favorite Success',
                'data' => $favorite
            ], 200);
        }

        return response([
            'message' => 'Delete Favorite Failed',
            'data' => null
        ], 400);
    }

    function checkIsFavorit(Request $request, $recipe_id){
        $user_id = $request->user()->id;
        $favorite = favorite::where('user_id', $user_id)->where('recipe_id', $recipe_id)->first();
        if($favorite){
            return response([
                'message' => 'Check Favorite Success',
                'data' => $favorite
            ], 200);
        }else{
            return response([
                'message' => 'Check Favorite Failed',
                'data' => null
            ], 200);
        }
    }


}
