<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Events\NoticeBookingEvent;

class ScheduleController extends Controller
{
    // them dv tu frontend
    public function add(Request $request)
    {
        try {

            if ($this->validateBooking($request->phone, Carbon::now())) {
                $schedule = new Schedule();
                $schedule->fill($request->all());
                // convert date
                $schedule->date = date('Y-m-d', strtotime($request->date));
                $schedule->save();
                $schedule->schedule_services()->attach($request->service_id);

                // auto create account customer
                // $user = $this->createUser($request->all());

                // dispatch event noitice
                $contents = 'SDT '.$request->phone.' đã đặt lịch khám.';
                $request->contents=$contents;
                event(new NoticeBookingEvent($request));

                return response()->json([
                    'success' => true,
                    'message' => 'Đặt thành công lịch khám!',
                    'data' => $schedule->toArray(),
                    // 'user' => $user,
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'Bạn vừa đặt lịch các đây 1 ngày! vui lòng thử lại sau 24h!',
                'data' => [],
                // 'user' => [],
            ], 400);
        } catch (Throwable $tr) {
            report($tr->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi! ' . $tr->getMessage(),
                'data' => [],
                // 'user' => [],
            ], 400);
        }
    }

    //check limit book 1 ngay / 1 lan && book cung ngay se huy
    public function validateBooking($phone, $date)
    {
        $scheduleExist = Schedule::where('phone', $phone)->count();

        // n booking
        if ($scheduleExist) {
            $time = 86400; // 1 day -> miligiay
            // $time = 86400000; // 1 day -> miligiay
            $schedule = Schedule::select('created_at')
                ->where('phone', $phone)
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

    public function createUser($requestData)
    {
        $userExits = User::select('*')->where('phone', $requestData['phone'])->first();

        if ($userExits) {
            $obj = $userExits;
        }
        if (!$userExits) {
            $newUser = new User();
            $newUser->fill($requestData);
            $newUser->name = $requestData['fullname'];
            $newUser->phone = $requestData['phone'];
            $password = randomString(6);
            $newUser->password = Hash::make($password);
            $newUser->email_user = $requestData['email'];
            $newUser->name = $requestData['fullname'];
            $newUser->save();
            $obj = $newUser;
            $obj->password_user = $password;
        }

        return $obj;
    }

    public function changeStatus(Request $request)
    {
        try {
            $schedule = Schedule::find($request->scheduleId);
            $schedule->status = $request->status;
            $schedule->save();

            return response()->json([
                'success' => true,
                'message' => 'Câp nhật thành công trạng thái',
                'data' => $schedule
            ]);
        } catch (Throwable $e) {
            report($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra, ' . $e->getMessage()
            ],500);
        }
    }


}
