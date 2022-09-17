<?php

namespace App\Http\Controllers\Backend\Schedule;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
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
        dd($request->all());
    }


    public function edit ()
    {
        return view('pages.schedules.edit');
    }

    public function update(ScheduleRequest $request){
        dd($request->all());
    }

}
