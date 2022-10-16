<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

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
            }])->first(['id']);
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
}
