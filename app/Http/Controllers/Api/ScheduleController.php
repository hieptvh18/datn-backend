<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
    // them dv tu frontend
    public function add(Request $request)
    {
        try {
            $user = $this->createUser($request->fullname, $request->phone);
            if ($this->validateBooking($request->phone, Carbon::now())) {
                $schedule = new Schedule();
                $schedule->fill($request->all());
                // convert date
                $schedule->date = date('Y-m-d', strtotime($request->date));
                $schedule->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Đặt thành công lịch khám!',
                    'data' => $schedule->toArray(),
                    'user' => $user,
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'Bạn vừa đặt lịch các đây 1 ngày! vui lòng thử lại sau 24h!',
                'data' => [],
                'user' => [],
            ], 400);

        } catch (Throwable $tr) {
            report($tr->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi! ' . $tr->getMessage(),
                'data' => [],
                'user' => [],
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
            $schedule = Schedule::select('created_at')
                ->where('phone',$phone)
                ->orderByDesc('created_at')
                ->limit(1)
                ->first();

            $period = strtotime($date) - strtotime($schedule->created_at);

            if ($period <= $time) {
                return false;
            }
        }
        return true;
    }

    public function createUser($name, $phone){
        $userExits = User::select('id', 'name', 'phone', 'password')->where('phone', $phone)->first();


        if($userExits){
           $user = $userExits;
        }
        if(!$userExits){
        $newUser = new User();
        $newUser->name = $name;
        $newUser->phone = $phone;
        $newUser->password = Hash::make('123456789');
        $newUser->email = '';
        $newUser->save();
        $user = $newUser;
        }
        return $user;
    }
}
