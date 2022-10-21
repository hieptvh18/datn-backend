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

    public function list () {
        try {
            $listFeedback = FeedBack::where('is_active', 1)->get(['id', 'customer_name', 'customer_email', 'customer_avatar', 'content']);
            return response()->json([
                'success'=>true,
                'message'=>'Danh sách đánh giá!',
                'data'=> $listFeedback
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
