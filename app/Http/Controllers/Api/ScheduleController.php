<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class ScheduleController extends Controller
{
    // them dv tu frontend
    public function add(Request $request){
        try{
            $schedule = new Schedule();
            $schedule->fill($request->all());
            $schedule->save();

            return response()->json([
                'success'=> true,
                'message'=>'Đặt thành công lịch khám!',
                'data'=>$schedule->toArray(),
            ],200);
        }catch(Throwable $tr){
            report($tr->getMessage());

            return response()->json([
                'success'=> false,
                'message'=>'Đã xảy ra lỗi! '.$tr->getMessage(),
                'data'=>[],
            ],400);
        }
    }
}
