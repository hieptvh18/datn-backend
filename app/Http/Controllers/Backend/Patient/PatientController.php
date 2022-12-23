<?php

namespace App\Http\Controllers\Backend\Patient;

use App\Exports\ExportPatient;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequset;
use App\Http\Requests\PatientRequest;
use App\Imports\ImportPatient;
use App\Mail\EmailConfirmSchedule;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Service;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $patients = Patient::where('is_deleted', 0)->sortable()->orderBy('id', 'desc')->paginate(20);
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
            $tokenUrl = strtolower(randomString(25));
            $patient->fill($request->all());
            $patient->date = date('Y-m-d', strtotime($request->date));
            $patient->birthday = date('Y-m-d', strtotime($request->birthday));
            $patient->token_url = $tokenUrl;
            $patient->save();
            $patient->patient_doctors()->attach($request->doctor);
            $patient->patient_products()->attach($request->product);
            // $patient->service_patients()->attach($request->service);
            $patient->service_patients()->attach($request->service, array('date'=>date('Y-m-d', strtotime($request->date))));

            $schedule = Schedule::find($request->schedule_id);
            $schedule->status = 3;
            $schedule->patient_id = $patient->id;
            $schedule->update();

            if($request->rebooking){
                $this->reBookingSave($request);
            }

            return redirect()->route('order.add', ['id'=>$patient->id])->with('message', 'Thêm thành công bệnh án!');
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
        $role = Role::where('role_name','Doctor')->first();
        if($role !== null){
            $roles_doctor = DB::table('role_admins')->where('role_id', $role->id)->get();
            $listUser = Admin::where('is_active', 1)->select('id', 'fullname')->get();
            $doctors = array();
            foreach ($listUser as $user) {
                foreach ($roles_doctor as $role) {
                    if ($user->id == $role->admin_id) {
                        array_push($doctors, $user);
                    }
                }
            }
        }else{
            $doctors = '';
        }

        $products = Product::select('id', 'name', 'price')->get();
        return view('pages.patients.add', compact('pageTitle', 'patient', 'services', 'doctors', 'products'));
    }

    public function reBookingSave(Request $request){
        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->fullname = $request->customer_name;
        $schedule->date = date('Y-m-d', strtotime($request->rebooking));
        $schedule->birthday = date('Y-m-d', strtotime($request->birthday));
        $schedule->status = 1;
        $schedule->is_rebooking = 1;
        $schedule->save();
        $scheduleId = $schedule->id;

        if ($scheduleId && $request->status == 1) {
            $contentAccount = '';
            $customerName = $request->fullname;
            $date = $request->date;
            $phone = $request->phone;
            $stt = $this->getIndexer($date, $phone);
            $companyName = 'Nha khoa Đức Nghĩa';
            $listService = $this->getServiceNameById($request->service_id);
            $contentConfirm = 'Cảm ơn bạn đã đăng kí dịch vụ của ' . $companyName . '. Lịch hẹn khám lại của bạn là ngày: ' . $date . ' .Số thứ tự là: ' . $stt . ' .Dịch vụ mà bạn đăng kí là: ' . $listService . '. ' . $contentAccount . '.Bạn vui lòng nhớ sô thứ tự khi đến phòng khám để được sử dụng dịch vụ sớm nhất! Cảm ơn!';
            // sendSms($phone, $contentConfirm);

            // send mail
            if (!empty($request->email)) {
                $mailTo = $request->email;
                $subject = 'Thông báo đặt lịch thành công';
                $mailData = $this->getMailData($contentConfirm, $customerName);
                Mail::to($mailTo)->send(new EmailConfirmSchedule($mailData,$subject));
            }
        }

        // return redirect()->route('schedules.index')->with(['message' => 'Thêm lịch khám lại thành công!']);
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
            $role = Role::where('role_name','Doctor')->first();
            $roles_doctor = DB::table('role_admins')->where('role_id', $role->id)->get();
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
            $patient->date = date('Y-m-d', strtotime($request->date));
            $patient->birthday = date('Y-m-d', strtotime($request->birthday));
            $patient->save();
            $patient->patient_doctors()->sync($request->doctor);
            $patient->patient_products()->sync($request->product);
            $patient->service_patients()->sync($request->service);
            return redirect()->route('order.add', ['id'=>$patient->id])->with('message', 'Cập nhật thành công bệnh án!');
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
            $patient = Patient::find($id);
            if ($patient) {
                // Patient::destroy($id);
                $patient->is_deleted = 1;
                $patient->update();
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
                    ->where('is_deleted', 0)
                    ->orwhere('customer_name', 'LIKE', '%' . $search_text . '%')
                    ->where('is_deleted', 0)
                    ->orwhere('phone', 'LIKE', '%' . $search_text . '%')
                    ->where('is_deleted', 0)
                    ->orwhere('description', 'LIKE', '%' . $search_text . '%')
                    ->where('is_deleted', 0)
                    ->orwhere('birthday', 'LIKE', '%' . $search_text . '%')
                    ->where('is_deleted', 0)
                    ->orwhere('address', 'LIKE', '%' . $search_text . '%')
                    ->where('is_deleted', 0)
                    ->paginate(15);
            }

            return view('pages.patients.list', compact('patients', 'pageTitle'));
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }
}
