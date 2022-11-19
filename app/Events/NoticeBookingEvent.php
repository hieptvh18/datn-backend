<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Exception;
use App\Models\Notice;
use App\Models\Admin;

class NoticeBookingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $getScheduleDetailUrl;

    public function __construct(Request $request)
    {
        $this->message  = $request->contents;
        $this->getScheduleDetailUrl = $this->getScheduleDetailUrl($request->phone);
        $this->saveNotice($request);
    }

    public function broadcastOn()
    {
        return ['development'];
    }

    protected function getScheduleDetailUrl($phone){
        try{
            $scheduleId = Schedule::where('phone',$phone)->orderByDesc('id')->first();
            $url = route('schedules.edit',$scheduleId->id);
            return $url;
        }catch(Exception $e){
            report($e->getMessage());
        }
    }

    protected function saveNotice(Request $request){
        try{
            $notice = new Notice();
            $notice->content = $request->contents; 
            $notice->read = 0; 
            $notice->save();

            $admins = Admin::all();
            foreach($admins as $admin){
                $notice->notice_admins()->attach($admin->id);
            }
        }catch(Exception $e){
            report($e->getMessage());
        }
    }
}
