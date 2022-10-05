<?php

namespace App\Http\Controllers\Backend\Patient;

use App\Exports\ExportPatient;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequset;
use App\Http\Requests\PatientRequest;
use App\Imports\ImportPatient;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Service;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        $patients = Patient::sortable()->paginate(20);
        return view('pages.patients.list', compact('patients', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pageTitle = 'Thêm mới bệnh án';
        return view('pages.patients.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try {
            $patient = new Patient();
            $patient->fill($request->all());
            $patient->save();
            $patient->patient_doctors()->attach($request->doctor);
            $patient->patient_products()->attach($request->product);
            $patient->service_patients()->attach($request->service);
            return redirect()->back()->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            report($e->getMessage());

            return redirect()->back()->with('exception', 'Đã xảy ra lỗi, vui lòng thử lại!'.$e->getMessage());
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
        $pageTitle = 'Thêm mới bệnh án';
        $services = Service::select('id', 'service_name')->get();
        $patient = Schedule::find($id);
        $roles_doctor = DB::table('role_admins')->where('role_id', '4')->get();
        $listUser = Admin::where('is_active', 1)->select('id', 'fullname')->get();
        $doctors = array();
        foreach ($listUser as $user) {
            foreach ($roles_doctor as $role) {
                if ($user->id == $role->admin_id) {
                    array_push($doctors, $user);
                }
            }
        }
        $products = Product::select('id', 'name', 'price')->get();
        return view('pages.patients.add', compact('pageTitle', 'patient', 'services', 'doctors', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Patient::find($id)) {
            $patient = Patient::find($id);
            $services = Service::select('id', 'service_name')->get();
            $pageTitle = 'Cập nhật bệnh án';
            $roles_doctor = DB::table('role_admins')->where('role_id', '4')->get();
            $listUser = Admin::where('is_active', 1)->select('id', 'fullname')->get();
            $doctors = array();
            foreach ($listUser as $user) {
                foreach ($roles_doctor as $role) {
                    if ($user->id == $role->admin_id) {
                        array_push($doctors, $user);
                    }
                }
            }
            $products = Product::select('id', 'name', 'price')->get();
            return view('pages.patients.edit', compact('pageTitle', 'patient', 'services', 'doctors', 'products'));
        }
        return redirect()->back()->with('error', 'Không tìm thấy hồ sơ!');
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
        try {
            $patient = Patient::find($id);
            $patient->fill($request->all());
            $patient->save();
            $patient->patient_doctors()->sync($request->doctor);
            $patient->patient_products()->sync($request->product);
            $patient->service_patients()->sync($request->service);
            return redirect()->back()->with('message', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            report($e->getMessage());
            return redirect()->back()->with('exception', 'Đã xảy ra lỗi, vui lòng thử lại!');
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
        try {
            if (Patient::find($id)) {
                Patient::destroy($id);
                return redirect()->back()->with('message', 'Xóa thành công!');
            }
        } catch (Exception $e) {
            report($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    public function importPatient(ImportRequset $request)
    {
        try {
            Excel::import(new ImportPatient, $request->file('file')->store('files'));
            return redirect()->back()->with(['message' => "Nhập dữ liệu thành công!"]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    public function exportPatient(Request $request)
    {
        try {
            return Excel::download(new ExportPatient($request->date), 'patient.xlsx');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    // search
    public function search(Request $request)
    {
        $pageTitle = 'Hồ sơ bệnh án';
        $key = $_GET['key'];
        $search_text = trim($key);
        try {
            if ($search_text == null) {
                return redirect()->route('patient.index');
            } else {
                $patients = Patient::sortable()->where('id', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('customer_name', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('phone', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('description', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('birthday', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('cmnd', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('address', 'LIKE', '%' . $search_text . '%')
                    ->paginate(15);
            }

            return view('pages.patients.list', compact('patients', 'pageTitle'));
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }
}
