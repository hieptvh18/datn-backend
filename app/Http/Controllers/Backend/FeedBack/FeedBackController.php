<?php

namespace App\Http\Controllers\Backend\FeedBack;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedBackRequest;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFeedback = FeedBack::select('id', 'customer_name', 'customer_email', 'customer_avatar', 'is_active')->paginate(15);
        return view('pages.feedback.list', compact('listFeedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedBackRequest $request)
    {
        try {
            $feedback = new FeedBack();
            $feedback->fill($request->all());
            if ($request->hasFile('customer_avatar')) {
                $file = $request->file('customer_avatar');
                $feedback->customer_avatar = fileUploader($file, 'feedback', 'uploads/feedbacks');
            } else {
                $feedback->customer_avatar = 'assets/img/profile-photos/no-image.png';
            }
            $feedback->save();

            return redirect()->route('feedback.index')->with('message', 'Tạo đánh giá thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('message', 'Đã xảy ra lỗi!' . $th->getMessage());
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
        $feedback = FeedBack::find($id);
        return view('pages.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeedBackRequest $request, $id)
    {
        try {
            $feedback = FeedBack::find($id);
            $feedback->fill($request->all());
            if ($request->hasFile('customer_avatar')) {
                $file = $request->file('customer_avatar');
                $feedback->customer_avatar = fileUploader($file, 'feedback', 'uploads/feedbacks');
            }
            $feedback->is_active = $request->is_active == 'on' ? 1 : 0;
            $feedback->update();

            return redirect()->route('feedback.index')->with('message', 'Cập nhật đánh giá thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('message', 'Đã xảy ra lỗi!' . $th->getMessage());
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
            FeedBack::destroy($id);
            return redirect()->route('feedback.index')->with('message', 'Xóa đánh giá thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('message', 'Đã xảy ra lỗi!' . $th->getMessage());
        }
    }

    public function changeStatus($id)
    {
        try {
            $feedback = FeedBack::find($id);
            $feedback->is_active = $feedback->is_active ? 0 : 1;
            $feedback->update();
            return redirect()->route('feedback.index')->with('message', 'Chuyển trạng thái thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('message', 'Đã xảy ra lỗi!' . $th->getMessage());
        }
    }
}
