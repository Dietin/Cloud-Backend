<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipe;
use App\Models\category;
use App\Models\recipe_steps;
use App\Models\recipe_ingredients;
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

        $recipe = recipe::skip(($page-1)*$size)->take($size)->with('category', 'recipe_steps', 'recipe_ingredients')->get();
        // $recipe = category::all();
        // $db = DB::table('recipe')->get();
        // $recipe = recipe::where('name','=','Sauteed Bananas with Cardamom Praline Sauce')->get();
        
        if(count($recipe) > 0){
            return response([
                'message' => 'Retrieve Recipe Success',
                'data' => $recipe
            ], 200);
        }
    }

    public function search($name){
        $recipes = recipe::where('name', 'like', '%' . $name . '%')->with('category')->get();
        
        if ($recipes->isNotEmpty()) {
            return response([
                'message' => 'Retrieve Recipes Success',
                'data' => $recipes
            ], 200);
        }
    }

    public function getByCategory($category){
        $recipe = recipe::where('category', $category)->with('category')->get();
        
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
