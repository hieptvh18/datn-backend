<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::paginate(15);
        return view('pages.orders.list', compact('orders'));
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
        $order->save();

        return view('pages.orders.detail', compact('order','services', 'products', 'total'))->with(['message'=>'Tạo hóa đơn thành công!']);

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

    public function delete($id){

    }
}
