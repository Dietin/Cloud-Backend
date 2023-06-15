<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\weightHistory;
use App\Models\dataUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class weightHistoryController extends Controller
{
    public function storeWeightHistory(Request $request){
        $storeData['user_id'] = $request->user()->id;
        $userId = $request->user()->id;

        $dataUser = DataUser::where('user_id', $userId)->first();

        if (!$dataUser) {
            return response()->json(['message' => 'DataUser not found'], 404);
        }

        $weightHistory = new weightHistory();
        $weightHistory->user_id = $storeData['user_id'];
        $weightHistory->dataUser_id = $dataUser->dataUser_id;
        $weightHistory->date = date("Y-m-d H:i:s");
        $weightHistory->idealCalories = $dataUser->idealCalories;

        if ($weightHistory->save()) {
            return response([
                'message' => 'Input Weight History Success',
                'data' => $weightHistory
            ], 200);
        }

        return response([
            'message' => 'Input Weight History Failed',
            'data' => null
        ], 400);
    }

    public function getByDate(Request $request, $date){
        $user_id = $request->user()->id;
        $weightHistory = DB::table('weightHistory')
                                ->select('*')
                                ->where('date','<', date("Y-m-d", strtotime($date . " +1 day")) )
                                ->orderBy('date', 'desc')
                                ->first();
        return response([
            'message' => 'Get weight history success',
            'data' => $weightHistory
        ], 200);
    }
}
