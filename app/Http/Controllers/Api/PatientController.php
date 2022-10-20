<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function list ($phone){
        try {
            $listPatient = Patient::where('phone', $phone)->get();
            return response()->json([
                'success'=>true,
                'message'=>'Danh sách bệnh án của bệnh nhân có sđt '. $phone,
                'data'=> $listPatient->toArray()
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ]);
        }
    }
    public function detail ($phone, $patientId){
        try {
            $patient = Patient::where('phone', $phone)->where('id', $patientId)->with(['service_patients'=>function($query){
                $query->select('service_name');
            }])->with(['patient_doctors'=>function($query){
                $query->select('fullname');
            }])->with(['patient_products'=>function($query){
                $query->select('name');
            }])->first(["id", "customer_name", "phone", "birthday", "cmnd", "description", "address", "schedule_id", "date"]);
            return response()->json([
                'success'=>true,
                'message'=>'Chi tiết bệnh án của bệnh nhân có sđt '. $phone,
                'data'=> $patient
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ]);
        }
    }

    // list doctor
    public function doctor () {
        try {
            $role_doctor = Role::where('role_name', 'Doctor')->first();
           if($role_doctor){
            $list_role_doctor = DB::table('role_admins')->where('role_id', $role_doctor->id)->get();
            $id_role_doctor = array();
            foreach($list_role_doctor as $role) {
                array_push($id_role_doctor, $role->admin_id);
            }
            $list_doctor = Admin::where('is_active', 1)->whereIn('id', $id_role_doctor)->with(['AdminSpecialist'=>function($query){
                $query->select('id', 'specialist_name', 'function', 'description');
            }])->with(['AdminLevel'=>function($query){
                $query->select('id', 'name', 'description');
            }])->with(['AdminRoom'=>function($query){
                $query->select('id', 'room_name', 'achievement', 'history', 'mission');
            }])->get(['id', 'fullname', 'room_id', 'level_id', 'specialist_id']);
            return response()->json([
                'success'=>true,
                'message'=>'Danh sách bác sĩ!',
                'data'=> $list_doctor
            ]);
           }else{
            return response()->json([
                'success'=>false,
                'message'=>'Không có bác sĩ nào!',
                'data'=> []
            ]);
           }
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ]);
        }
    }
}
