<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\foodHistory;

class foodHistoryController extends Controller
{
    public function store(Request $request){
        $storeData = $request->all();
        $validate = Validator::make($storeData, [
            'user_id' => 'required',
            'recipe_id' => 'required',
            'calories' => 'required',
            'carbs' => 'required',
            'fats' => 'required',
            'proteins' => 'required',
            'food_time' => 'required',
            'date' => 'required',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()->first(),'errors' => $validate->errors()], 400);

        $foodHistory = foodHistory::create($storeData);
        return response([
            'message' => 'Add Food History Success',
            'data' => $foodHistory
        ], 200);
    }

    public function delete($id){
        $foodHistory = foodHistory::find($id);

        if(is_null($foodHistory)){
            return response([
                'message' => 'Food History Not Found',
                'data' => null
            ], 404);
        }

        if($history->delete()){
            return response([
                'message' => 'Delete Food History Success',
                'data' => $history
            ], 200);
        }

        return response([
            'message' => 'Delete Food History Failed',
            'data' => null
        ], 400);
    }
}
