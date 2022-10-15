<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Mail\EmailConfirmSchedule;

class OrderController extends Controller
{
    //
    public function index(Request $request){
        try {
            $orders = Order::sortable()->orderby('created_at', 'desc');
            if(isset($request->start)){
                    $startDate = date('Y-m-d', strtotime($request->start));
                    $endDate = isset($request->end) ? date('Y-m-d', strtotime($request->end)) : $startDate;
                    $listSchedules = $orders->whereBetween('date', [$startDate, $endDate]);
            }
            $orders = $orders->paginate(15);
            return view('pages.orders.list', compact('orders'));
        } catch (\Throwable $th) {
           report($th->getMessage());
           return redirect()->back()->with('error', 'Đã có lỗi xảy ra!');
        }
    }

    public function add(){
        $services = Service::all();
        $products = Product::all();
        $patient = Patient::find($_GET['id']);
        return view('pages.orders.add', compact('patient','services', 'products'));
    }

    public function save(Request $request){
        $products = Product::whereIn('id', $request->product)->select('name', 'price')->get();
        $services = Service::whereIn('id', $request->service)->select('service_name', 'price')->get();

        $product_id = implode('|', $request->product);
        $service_id = implode('|', $request->service);

        $total = 0;
        for ($i=0; $i < count($products); $i++) {
            $total += $products[$i]->price;
        }
        for ($i=0; $i < count($services); $i++) {
            $total += $services[$i]->price;
        }


        $order = new Order();
        $order->fill($request->all());
        $order->product_id = $product_id;
        $order->service_id = $service_id;
        $order->code_bill = $this->generateUniqueCode();
        $order->total = $total;
        $order->date = Carbon::now()->format('Y-m-d');
        $order->save();

        // send notifi thank you
        $customerName = $order->customer_name;
        $companyName = 'Nha khoa Đức Nghĩa';
        $linkPatientPage = 'https://localhost:3000';

        // send mail
        if (!empty($request->customer_email)) {
            $mailTo = $request->customer_email;
            $mailData = $this->getMailData($customerName,$companyName,$linkPatientPage);
            Mail::to($mailTo)->send(new EmailConfirmSchedule($mailData));
        }

        $schedule = Schedule::find($request->schedule_id);
        $schedule->status = 3;
        $schedule->update();

        return view('pages.orders.detail', compact('order','services', 'products', 'total'))->with(['message'=>'Tạo hóa đơn thành công!']);

    }

    // get mailData
    protected function getMailData($customerName = 'bạn', $companyName = 'Nha khoa Đức Nghĩa',$linkPatientPage='https://fb.com/tvhh18')
    {
        // get data from web setting
        $mailData = [];
        $mailData['mailTitle'] = $companyName.' cảm ơn quý khách đã tin tưởng và ủng hộ.';
        $mailData['mailHead'] = '';
        $mailData['companyName'] = $companyName;
        $mailData['mailSubject'] = 'Chào ' . $customerName;
        $mailData['mailContent'] = 'Cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của '.$companyName.' hãy truy cập đường link bên dưới để  xem chi tiết hóa đơn của quý khách.';
        $mailData['linkPatient'] = $linkPatientPage;
        $mailData['baseUrl'] = 'https://localhost:3000';

        return $mailData;
    }

    public function generateUniqueCode()
    {
        do {
            $referal_code = random_int(100000000000, 999999999999);
        } while (Order::where("id", "=", $referal_code)->first());

        return $referal_code;
    }

    // view bill
    public function detail($id){
        $order = Order::find($id);
        $product_id = explode('|', $order->product_id);
        $service_id = explode('|', $order->service_id);
        $products = Product::whereIn('id', $product_id)->select('name', 'price')->get();
        $services = Service::whereIn('id', $service_id)->select('service_name', 'price')->get();
        $total = $order->total;

        return view('pages.orders.detail', compact('order','services', 'products', 'total'))->with(['message'=>'Tạo hóa đơn thành công!']);
    }

    public function pdf ($id){
        $order = Order::find($id);
        $product_id = explode('|', $order->product_id);
        $service_id = explode('|', $order->service_id);
        $products = Product::whereIn('id', $product_id)->select('name', 'price')->get();
        $services = Service::whereIn('id', $service_id)->select('service_name', 'price')->get();
        $total = $order->total;

        $options = new Options();
        $options->setDefaultFont('Dejavu Sans');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $path = base_path('public/assets/img/logo-logo.jpg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = FacadePdf::setOptions([$options])->setPaper('a4')->loadView('pages.orders.bill', ['order'=>$order,'services'=>$services, 'products'=>$products, 'total'=>$total, 'pic'=> $pic]);
    		// return $pdf->download('orderBill.pdf');
            return $pdf->stream('myPDF.pdf');
    }

    // search
    public function search (){
        $key = $_GET['key'];

        $search_text = trim($key);
        try {
            if ($search_text==null) {
                return redirect()->route('order.index');
            } else {
                $orders=Order::where('id','LIKE', '%'.$search_text.'%')
                ->orwhere('customer_name','LIKE', '%'.$search_text.'%')
                ->orwhere('customer_phone','LIKE', '%'.$search_text.'%')
                ->orwhere('date','LIKE', '%'.$search_text.'%')
                ->paginate(15);
            }
            return view('pages.orders.list', compact('orders'));
           } catch (\Throwable $th) {
                return $th;
           }
    }

    public function delete($id){

    }
}
