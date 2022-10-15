<?php

namespace App\Http\Controllers\Backend\Schedule;

use App\Exports\ExportSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequset;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Imports\ImportSchedule;
use App\Mail\EmailConfirmSchedule;
use App\Models\Schedule;
use App\Models\ScheduleService;
use App\Models\Service;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;


class ScheduleController extends Controller
{
    //list
    public function index(Request $request)
    {
        try {
            $listSchedules = Schedule::sortable();
            // dd($listSchedules->toSql());
            if (isset($request->start)) {
                $startDate = date('Y-m-d', strtotime($request->start));
                $endDate = isset($request->end) ? date('Y-m-d', strtotime($request->end)) : $startDate;
                $listSchedules = $listSchedules->whereBetween('date', [$startDate, $endDate]);
            }

            $listSchedules = $listSchedules->paginate(15);
        } catch (Throwable $e) {
            report($e->getMessage());
            return redirect()->route('schedules.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }

        return view('pages.schedules.list', compact('listSchedules'));
    }

    // add
    public function create()
    {
        $services = Service::where('is_active', 1)->get();
        $pageTitle = 'Tạo mới lịch khám';
        return view('pages.schedules.create', compact('pageTitle', 'services'));
    }

    public function store(ScheduleRequest $request)
    {
        try {
            $schedule = new Schedule();
            $schedule->fill($request->all());
            $schedule->status = 1;
            $schedule->save();
            $scheduleId = $schedule->id;

            // send sms to phone || mail
            if ($scheduleId && $request->status == 1) {

                // auto create account customer
                $contentAccount = '';
                if (!User::where('phone', $request->phone)->exists()) {
                    $user = new User();
                    $user->name = $request->fullname;
                    $user->phone = $request->phone;
                    $user->email_user = $request->email;
                    $password = randomString(6);
                    $user->password = bcrypt($password);
                    $user->save();
                    $contentAccount = 'Chúng tôi đã tạo cho bạn tài khoản để theo dõi thông tin trên website với tài khoản là : ' . $request->phone . ' , mật khẩu: ' . $password . ' . Vui lòng không tiết lộ thông tin này cho bất kì ai.';
                }

                $customerName = $request->fullname;
                $date = $request->date;
                $phone = $request->phone;
                $stt = $this->getIndexer($date, $phone);
                $companyName = 'Nha khoa Đức Nghĩa';
                $listService = $this->getServiceNameById($request->service_id);
                $contentConfirm = 'Cảm ơn bạn đã đăng kí dịch vụ của ' . $companyName . '. Lịch hẹn của bạn là ngày: ' . $date . ' .Số thứ tự là: ' . $stt . ' .Dịch vụ mà bạn đăng kí là: ' . $listService . '. ' . $contentAccount . '.Bạn vui lòng nhớ sô thứ tự khi đến phòng khám để được sử dụng dịch vụ sớm nhất! Cảm ơn!';
                // sendSms($phone, $contentConfirm);

                // send mail
                if (!empty($request->email)) {
                    $mailTo = $request->email;
                    $mailData = $this->getMailData($contentConfirm, $customerName);
                    Mail::to($mailTo)->send(new EmailConfirmSchedule($mailData));
                }
            }

            //save services[]
            $schedule->schedule_services()->attach($request->service_id);

            return redirect()->route('schedules.index')->with(['message' => 'Thêm mới lịch khám thành công!']);
        } catch (Throwable $e) {
            // dd($e->getMessage());
            report($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    // edit
    public function edit($id)
    {
        $pageTitle = 'Cập nhật lịch khám';
        $schedule = Schedule::find($id);
        $services = Service::where('is_active', 1)->get();
        $scheduleServices = $schedule->schedule_services()
            ->get()->toArray();
        $arrService = array();
        foreach ($scheduleServices as $item) {
            array_push($arrService, $item['pivot']['service_id']);
        }
        return view('pages.schedules.edit', compact('schedule', 'pageTitle', 'services', 'arrService'));
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        try {
            $schedule = Schedule::find($id);
            $schedule->fill($request->all());
            $update = $schedule->save();
            $scheduleId = $schedule->id;
            // ScheduleService::where('schedule_id', $id)->delete();
            $schedule->schedule_services()->sync($request->service_id);

            if ($scheduleId && $request->status == 1) {

                // auto create account customer
                $contentAccount = '';
                if (!User::where('phone', $request->phone)->exists()) {
                    $user = new User();
                    $user->name = $request->fullname;
                    $user->phone = $request->phone;
                    $user->email_user = $request->email;
                    $password = randomString(6);
                    $user->password = bcrypt($password);
                    $user->save();
                    $contentAccount = 'Chúng tôi đã tạo cho bạn tài khoản để theo dõi thông tin trên website với tài khoản là : ' . $request->phone . ' , mật khẩu: ' . $password . ' . Vui lòng không tiết lộ thông tin này cho bất kì ai.';
                }

                // send sms to phone
                $customerName = $request->fullname;
                $date = $request->date;
                $phone = $request->phone;
                $stt = $this->getIndexer($date, $phone);
                $companyName = 'Nha khoa Đức Nghĩa';
                $listService = $this->getServiceNameById($request->service_id);
                $contentConfirm = 'Cảm ơn bạn đã đăng kí dịch vụ bên ' . $companyName . ' chúng tôi. Lịch hẹn của bạn là ngày: ' . $date . ' .Số thứ tự là: ' . $stt . ' .Dịch vụ mà bạn đăng kí là: ' . $listService . '. '.$contentAccount.'.Bạn vui lòng nhớ sô thứ tự khi đến phòng khám để được sử dụng dịch vụ sớm nhất! Cảm ơn!';
                // sendSms($phone, $contentConfirm);

                // send mail
                if (!empty($request->email)) {
                    $mailTo = $request->email;
                    $mailData = $this->getMailData($contentConfirm, $customerName);
                    Mail::to($mailTo)->send(new EmailConfirmSchedule($mailData));
                }
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
    public function search()
    {
        $key = $_GET['key'];

        $search_text = trim($key);
        try {
            if ($search_text == null) {
                return redirect()->route('schedules.index');
            } else {
                $listSchedules = Schedule::where('id', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('fullname', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('birthday', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('gender', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('phone', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('email', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('address', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('cmnd', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('content', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('date', 'LIKE', '%' . $search_text . '%')
                    ->paginate(15);
            }
            return view('pages.schedules.list', compact('listSchedules'));
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    // filter data range
    public function filterDateRange($startDate, $endDate)
    {
    }

    // import
    public function importSchedule(ImportRequset $request)
    {
        // dd($request->all());

        try {
            Excel::import(new ImportSchedule, $request->file('file')->store('files'));
            return redirect()->back()->with(['message' => 'Nhập dữ liệu thành công!']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    // export
    public function exportSchedule(Request $request)
    {
        try {
            return Excel::download(new ExportSchedule($request->date), 'schedule.xlsx');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    // get mailData
    protected function getMailData($mailContent, $customerName = 'bạn', $companyName = 'Nha khoa Đức Nghĩa',)
    {
        // get data from web setting
        $mailData = [];
        $mailData['mailTitle'] = 'Thông báo xác nhận lịch khám ' . $companyName;
        $mailData['mailHead'] = 'Thông báo xác nhận.';
        $mailData['companyName'] = $companyName;
        $mailData['mailSubject'] = 'Chào ' . $customerName;
        $mailData['mailContent'] = $mailContent;
        $mailData['linkPatient'] = '';
        $mailData['baseUrl'] = 'https://localhost:3000';

        return $mailData;
    }

    // get list service name by service_id
    protected function getServiceNameById($id)
    {
        if (is_array($id)) {
            $string = '';
            $services = Service::select('service_name')->whereIn('id', $id)->get();
            foreach ($services as $item) {
                if ($string) {
                    $string .= ', ' . $item->service_name;
                } else {
                    $string .= $item->service_name;
                }
            }

            return $string;
        }
    }

    // get so thu tu send notifi trong ngay
    public function getIndexer($date, $phone)
    {
        $dateFormat = date('Y-m-d', strtotime($date));
        $checkExistCounter = Schedule::where('counter', '>', 0)
            ->where('date', $dateFormat)
            ->where('status', 1)
            ->where('phone', '!=', $phone)
            ->orderBy('counter', 'desc')->first();
        $setSchedule = Schedule::where('phone', $phone)
            ->where('date', $dateFormat)
            ->where('status', 1)->first();
        $myCouter = Schedule::where('counter', '>', 0)
            ->where('date', $dateFormat)
            ->where('phone', $phone)
            ->first();

        $counter = 0;
        if ($checkExistCounter && !$myCouter) {
            $setSchedule->counter = $checkExistCounter->counter + 1;
            $setSchedule->save();
            $counter = $setSchedule->counter;
        } else if (!$checkExistCounter) {
            $setSchedule->counter = 1;
            $setSchedule->save();
            $counter = $setSchedule->counter;
        } else {
            $counter = $myCouter->counter;
        }
        return $counter;
    }
}
