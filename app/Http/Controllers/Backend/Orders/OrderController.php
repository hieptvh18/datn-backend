<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

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

        $order = new Order();
        $order->fill($request->all());
        $order->save();

        $service_name = implode('|', $request->service_name);
        $service_price = implode('|', $request->service_price);

        if($request->product_name == null && $request->price == null ){
            $product_name = '';
            $product_price = '';
        }else{
            $product_name = implode('|', $request->product_name);
            $product_price = implode('|', $request->product_price);

        }

        $test = new Order_detail();
        $test->order_id = $order->id;
        $test->product_name = $product_name;
        $test->product_price = $product_price;
        $test->service_name = $service_name;
        $test->service_price = $service_price;
        $test->save();

        return redirect()->route('order.index')->with(['message'=>'Tạo hóa đơn thành công!']);

    }

    // view detail order + set status
    public function detail($id){
        $order = Order::where('id', $id)->first();
        $order_detail = Order_detail::where('order_id', $id)->first();
        $new_service_name = explode('|', $order_detail->service_name);
        $new_product_name = explode('|', $order_detail->product_name);
        $products = Product::whereIn('name', $new_product_name)->get();
        $services = Service::whereIn('service_name', $new_service_name)->get();
        $total = 0;
        for ($i=0; $i < count($services); $i++) {
           $total += $services[$i]->price;
        }
        for ($i=0; $i < count($products); $i++) {
           $total += $products[$i]->price;
        }
        return view('pages.order_details.detail', compact('order','services', 'products', 'total'));
    }

    public function delete($id){

    }
}
