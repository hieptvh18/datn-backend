<?php

namespace App\Http\Controllers;

use App\Events\NoticeBookingEvent;
use App\Models\Notice as ModelsNotice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Notice;

class NoticeBookingController extends Controller
{
    public function addNotice($userId,$message){
        try{
            $notication = new ModelsNotice();
            $notication->user_id = $userId;
            $notication->message = $message;
            $notication->date = Carbon::now();
            $notication->read = 0;

            if($notication->save()){
                // kích hoạt sự kiện gửi message thông qua pusher.
                $event = new NoticeBookingEvent(['time'=>Carbon::now(),'msg'=>$message,'user_id'=>$userId]);
                event($event);
            }
        }catch(\Throwable $e){
            report($e->getMessage());
        }
    }
}
