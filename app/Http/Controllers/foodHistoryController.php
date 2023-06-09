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
        $storeData['user_id'] = $request->user()->id;
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

    //mengambil date yang spesifik dan berdasarkan user_id yang sedang login
    public function getByDate(Request $request, $date){
        $user_id = $request->user()->id;
        $foodHistory = foodHistory::where('user_id', $user_id)->where('date', $date)->get();
    
        if ($foodHistory->isEmpty()) {
            return response([
                'message' => 'No food history found on the specific user and date',
                'data' => null
            ], 404);
        }
        
        return response([
            'message' => 'Retrieve specific food history success',
            'data' => $foodHistory
        ], 200);
    }

    //mengambil calories berdasarkan date and time dan berdasarkan user_id yang sedang login
    public function getCaloriesByDateAndTime(Request $request, $date){
        $user_id = $request->user()->id;
        $caloriesByDateAndTime = DB::table('foodHistory')
                                ->select('food_time', DB::raw('SUM(calories) as total_calories'))
                                ->where('user_id', $user_id)
                                ->where('date', $date)
                                ->groupBy('food_time')
                                ->get();

        if ($caloriesByDateAndTime->isEmpty()) {
            return response([
                'message' => 'No food history found on the specific user and date',
                'data' => null
            ], 404);
        }

        return response([
            'message' => 'Retrieve calories grouped by date and food time success',
            'data' => $caloriesByDateAndTime
        ], 200);
    }

}
