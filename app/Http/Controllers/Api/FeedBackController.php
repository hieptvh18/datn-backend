<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function add (Request $request){
       try {
        $feedback = new FeedBack();
        $feedback->fill($request->all());
        $feedback->is_active = 0;
        if($request->hasFile('customer_avatar')){
            $file = $request->file('customer_avatar');
            $feedback->customer_avatar = fileUploader($file, 'feedback', 'uploads/feedbacks');
        }else{
            $feedback->customer_avatar = 'assets/img/profile-photos/no-image.png';
        }
        $feedback->save();
        return response()->json([
            'success'=>true,
            'message'=>'Gửi đánh giá thành công!',
            'data'=> $feedback
        ]);
       } catch (\Throwable $th) {
        report($th->getMessage());
        return response()->json([
            'success'=>false,
            'message'=>'Đã xảy ra lỗi!'. $th->getMessage(),
            'data'=> []
        ]);
       }
    }
}
