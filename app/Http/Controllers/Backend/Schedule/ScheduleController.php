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
        $listSchedules = Schedule::paginate(5);
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

}
