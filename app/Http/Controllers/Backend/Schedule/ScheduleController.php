<?php

namespace App\Http\Controllers\Backend\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //list 
    public function index()
    {
        return view('pages.schedules.list');
    }

    // add
    public function create()
    {
        return view('pages.schedules.create');
    }

}
