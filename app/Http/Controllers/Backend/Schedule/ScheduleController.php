<?php

namespace App\Http\Controllers\Backend\Schedule;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //list
    public function index()
    {
        $listSchedules = Schedule::sortable()->paginate(15);
        return view('pages.schedules.list', compact('listSchedules'));
    }

    // add
    public function create()
    {
        return view('pages.schedules.create');
    }

    public function store(ScheduleRequest $request)
    {
        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->save();
        return redirect()->route('schedules.index')->with(['message'=>'Thêm mới lịch khám thành công!']);
    }


    // edit
    public function edit ($id)
    {
        $schedule = Schedule::find($id);
        return view('pages.schedules.edit', compact('schedule'));
    }

    public function update(UpdateScheduleRequest $request, $id){
        $schedule = Schedule::find($id);
        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with(['message'=>'Cập nhật lịch khám thành công!']);
    }

    // delete
    public function destroy ($id){
        Schedule::destroy($id);
        return redirect()->route('schedules.index')->with(['message'=>'Xóa lịch khám thành công!']);
    }

    // search
    public function search() {
        $key = $_GET['key'];

        $search_text = trim($key);
       try {
        if ($search_text==null) {
            return redirect()->route('schedules.index');
        } else {
            $listSchedules=Schedule::where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('fullname','LIKE', '%'.$search_text.'%')
            ->orwhere('birthday','LIKE', '%'.$search_text.'%')
            ->orwhere('gender','LIKE', '%'.$search_text.'%')
            ->orwhere('phone','LIKE', '%'.$search_text.'%')
            ->orwhere('email','LIKE', '%'.$search_text.'%')
            ->orwhere('address','LIKE', '%'.$search_text.'%')
            ->orwhere('cmnd','LIKE', '%'.$search_text.'%')
            ->orwhere('content','LIKE', '%'.$search_text.'%')
            ->orwhere('date','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }
        return view('pages.schedules.list', compact('listSchedules'));
       } catch (\Throwable $th) {
            return $th;
       }
    }

}
