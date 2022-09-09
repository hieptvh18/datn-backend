<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index(){

        return view('pages.specialist.list');
    }

    public function add(){
        $pageTitle = 'Thêm mới chuyên khoa';
        return view('pages.specialist.form',compact('pageTitle'));
    }

    public function save(Request $request){
        dd($request->all());
    }

    public function edit(){
    
    }

    public function update(){

    }

    public function delete(){

    }
}
