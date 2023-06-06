<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipe;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    public function index(Request $request){

        $data = Validator::make($request->all(), [
            'page' => 'required|integer',
            'size' => 'required|integer'
        ]);

        if($data->fails()){
            return response([
                'message' => 'Failed',
                'data' => $data->errors()
            ], 400);
        }

        $page = $request->page;
        $size = $request->size;

        $recipe = recipe::skip(($page-1)*$size)->take($size)->with('category')->get();
        // $recipe = category::all();
        // $db = DB::table('recipe')->get();
        // $recipe = recipe::where('name','=','Sauteed Bananas with Cardamom Praline Sauce')->get();
        
        if(count($recipe) > 0){
            return response([
                'message' => 'Retrieve All Success',
                'data' => $recipe
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }
    public function search($name){
        $recipe = recipe::where('name', $name)->first();
        
        if (!is_null($recipe)) {
            return response([
                'message' => 'Retrieve Recipe Success',
                'data' => $recipe
            ], 200);
        }
        
        return response([
            'message' => 'Recipe Not Found',
            'data' => null
        ], 404);
    }
    
}
