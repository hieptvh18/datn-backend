<?php

namespace App\Http\Controllers\Backend\Schedule;

use App\Exports\ExportSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequset;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Imports\ImportSchedule;
use App\Models\Schedule;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;


class ScheduleController extends Controller
{
    //list
    public function index(Request $request)
    {
        try{
            $listSchedules = Schedule::sortable();
            // dd($listSchedules->toSql());
            if(isset($request->start) ){
                $startDate = date('Y-m-d',strtotime($request->start));
                $endDate = isset($request->end) ? date('Y-m-d',strtotime($request->end)) : $startDate;
                $listSchedules = $listSchedules->whereBetween('date',[$startDate,$endDate]);
            }

            $listSchedules = $listSchedules->paginate(15);

        }catch(Throwable $e){
            dd($e->getMessage());
            report($e->getMessage());
            return redirect()->route('schedules.index')->with('error','Có lỗi xảy ra, vui lòng thử lại!');
        }

        return view('pages.schedules.list', compact('listSchedules'));
    }

    // add
    public function create()
    {
        $pageTitle = 'Tạo mới lịch khám';
        return view('pages.schedules.create', compact('pageTitle'));
    }

    public function store(ScheduleRequest $request)
    {
        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->status = 1;
        $schedule->save();
        return redirect()->route('schedules.index')->with(['message' => 'Thêm mới lịch khám thành công!']);
    }

    // edit
    public function edit($id)
    {
        $pageTitle = 'Cập nhật lịch khám';
        $schedule = Schedule::find($id);
        return view('pages.schedules.edit', compact('schedule', 'pageTitle'));
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        try {
            $schedule = Schedule::find($id);
            $update = $schedule->update($request->all());
            if($update && $request->status == 1){
                // check if changed status is confirmed => send sms to phone
                $date = $request->date;
                $phone = $request->phone;
                $stt = $schedule->id;
                $content = 'Cảm ơn bạn đã đăng kí lịch khám của Nha khoa Đức Nghĩa. Lịch hẹn của bạn là: '.$date .'. Số thứ tự là '.$stt;
                sendSms($phone,$content);
            }
            return redirect()->back()->with(['message' => 'Cập nhật lịch khám thành công!']);
        } catch (Throwable $e) {
            dd($e->getMessage());
            report($e->getMessage());
            return redirect()->back()->with(['error' => 'Có lỗi xảy ra! Vui lòng thử lại sau!']);
        }
    }

    // delete
    public function destroy($id)
    {
        Schedule::destroy($id);
        return redirect()->route('schedules.index')->with(['message' => 'Xóa lịch khám thành công!']);
    }

    // search
    public function search() {
        $key = $_GET['key'];

        $search_text = trim($key);
       try {
        if ($search_text==null) {
            return redirect()->route('schedules.index');
        } else {
            $listSchedules=Schedule::where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('fullname','LIKE', '%'.$search_text.'%')
            ->orwhere('birthday','LIKE', '%'.$search_text.'%')
            ->orwhere('gender','LIKE', '%'.$search_text.'%')
            ->orwhere('phone','LIKE', '%'.$search_text.'%')
            ->orwhere('email','LIKE', '%'.$search_text.'%')
            ->orwhere('address','LIKE', '%'.$search_text.'%')
            ->orwhere('cmnd','LIKE', '%'.$search_text.'%')
            ->orwhere('content','LIKE', '%'.$search_text.'%')
            ->orwhere('date','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }
        return view('pages.schedules.list', compact('listSchedules'));
       } catch (\Throwable $th) {
        report($th->getMessage());
        return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
       }
    }

    // filter data range
    public function filterDateRange($startDate , $endDate){

    }

    // import
    public function importSchedule (ImportRequset $request){
      try {
        Excel::import(new ImportSchedule, $request->file('file')->store('files'));
        return redirect()->back()->with(['message'=>'Nhập dữ liệu thành công!']);
      } catch (\Throwable $th) {
        report($th->getMessage());
        return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
      }
    }

    // export
    public function exportSchedule (Request $request){
        try {
            return Excel::download(new ExportSchedule($request->date), 'schedule.xlsx');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

}
