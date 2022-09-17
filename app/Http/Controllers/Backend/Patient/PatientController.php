<?php

namespace App\Http\Controllers\Backend\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Hồ sơ bệnh án';
        $patients = Patient::paginate(20);
        return view('pages.patients.list',compact('patients','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Thêm mới bệnh án';
        return view('pages.patients.add',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try{
            $patient = new Patient();
            $patient->fill($request->all());
            $patient->save();
            return redirect()->back()->with('message','Thêm thành công!');
        }catch(\Exception $e){
            report($e->getMessage());
            return redirect()->back()->with('exception','Đã xảy ra lỗi, vui lòng thử lại!');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Patient::find($id)){
            $patient = Patient::find($id);
            $pageTitle = 'Cập nhật bệnh án';
            return view('pages.patients.edit',compact('pageTitle','patient'));
        }
        return redirect()->back()->with('error','Không tìm thấy hồ sơ!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        try{
            $patient = Patient::find($id);
            $patient->fill($request->all());
            $patient->save();
            return redirect()->back()->with('message','Cập nhật thành công!');
        }catch(\Exception $e){
            report($e->getMessage());
            return redirect()->back()->with('exception','Đã xảy ra lỗi, vui lòng thử lại!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if(Patient::find($id)){
                Patient::destroy($id);
                return redirect()->back()->with('message','Xóa thành công!');
            }
        }catch(Exception $e){
            report($e->getMessage());
            return redirect()->back()->with('error','Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }
}
