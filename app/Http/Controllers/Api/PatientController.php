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
}
