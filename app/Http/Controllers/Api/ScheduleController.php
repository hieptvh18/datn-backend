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
    public function add(Request $request)
    {
        try {
            if ($this->validateBooking($request->phone, $request->date)) {

                $schedule = new Schedule();
                $schedule->fill($request->all());
                // convert date
                $schedule->date = date('Y-m-d', strtotime($request->date));
                $schedule->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Đặt thành công lịch khám!',
                    'data' => $schedule->toArray(),
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'Bạn vừa đặt lịch các đây 1 ngày! vui lòng thử lại sau 24h!',
                'data' => [],
            ], 400);
        } catch (Throwable $tr) {
            report($tr->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi! ' . $tr->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    //check limit book 1 ngay / 1 lan && book cung ngay se huy
    public function validateBooking($phone, $date)
    {
        $scheduleExist = Schedule::where('phone', $phone)->count();

        // n booking
        if ($scheduleExist) {
            $time = 86400000; // 1 day -> miligiay
            $schedule = Schedule::select('created_at')->orderByDesc('created_at')
                ->limit(1)
                ->first();
            // khoang tg
            $period = strtotime($date) - strtotime($schedule);

            if ($period <= $time) {
                return false;
            }
        }
        return true;
    }
}
