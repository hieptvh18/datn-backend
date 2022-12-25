<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class PatientController extends Controller
{
    public function list ($phone){
        try {
            $listPatient = Patient::where('phone', $phone)->where('is_deleted', 0)->get();
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
            ],500);
        }
    }
    public function detail ($phone, $patientId){
        try {
            $patient = Patient::where('phone', $phone)->where('id', $patientId)->where('is_deleted', 0)->with(['service_patients'=>function($query){
                $query->select('service_name','price');
            }])->with(['patient_doctors'=>function($query){
                $query->select('fullname');
            }])->with(['patient_products'=>function($query){
                $query->select('name','price');
            }])->with(['getHdsdProduct'=>function($query){
                $query->select('patient_id','product_id_hdsd');
            }])->first(["id", "customer_name", "phone", "birthday", "description", "address", "schedule_id", "date",'token_url']);


            $patient1 = Patient::with('getHdsdProduct')->where('phone', $phone)->where('id', $patientId)->where('is_deleted', 0)->first();

            $arr = array();

            foreach($patient1->getHdsdProduct as $product){
                 array_push($arr, $product->product_id_hdsd);
            }
            $hdsds = explode('|||',$arr[0]);
            $arrKey = array('product_id', 'hdsd');
            $arrHdsd = array();
            foreach($hdsds as $hd){
                if($hd){
                    array_push($arrHdsd, array_combine($arrKey, explode('/*/*/',$hd)));
                }
            }

            return response()->json([
                'success'=>true,
                'message'=>'Chi tiết bệnh án của bệnh nhân có sđt '. $phone,
                'data'=> $patient,
                'hdsd'=>$arrHdsd
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ],500);
        }
    }

    public function detailById ($token, $id){
        try {
            $patient = Patient::where('id', $id)->where('token_url', $token)->where('is_deleted', 0)->with(['service_patients'=>function($query){
                $query->select('service_name','price');
            }])->with(['patient_doctors'=>function($query){
                $query->select('fullname');
            }])->with(['patient_products'=>function($query){
                $query->select('name','price');
            }])->first(["id", "customer_name", "phone", "birthday", "description", "address", "schedule_id", "date",'token_url']);
            return response()->json([
                'success'=>true,
                'message'=>'Chi tiết bệnh án của 1 bệnh nhân',
                'data'=> $patient
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ],400);
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
            $list_doctor = Admin::select('*')->where('is_active', 1)->whereIn('id', $id_role_doctor)->with(['AdminSpecialist'=>function($query){
                $query->select('id', 'specialist_name', 'function', 'description');
            }])->with(['AdminLevel'=>function($query){
                $query->select('id', 'name', 'description');
            }])->with(['AdminRoom'=>function($query){
                $query->select('id', 'room_name', 'achievement', 'history', 'mission');
            }])->get(['id', 'fullname', 'room_id', 'level_id', 'specialist_id', 'avatar', 'description']);
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
            ],500);
           }
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success'=>false,
                'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
                'data'=> []
            ],500);
        }
    }
}
