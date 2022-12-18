@extends('layout.master')
@section('page-title', 'Chi tiết hóa đơn')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row" style="display: flex; width: 95%; margin: 0 auto; padding: 25px 0">
                        <div class="col-sm-1" style="margin-top: -42px">
                            <img src="{{asset($logoWeb->logo)}}" width="200px"  style="padding-top: 17px;" alt="">
                        </div>
                        <div class="col-sm-8" style="text-align: center; margin: 12px 0 0 140px ; line-height: 25px">
                            <h4>PHÒNG KHÁM NHA KHOA ĐỨC NGHĨA</h4>
                           <b >Địa chỉ:</b> Trịnh Văn Bô - Nam từ liêm - Hà Nội <br>
                           <b>Số điện thoại:</b> 18001001
                        </div>
                        <div class="col-sm-3" style="text-align: right; line-height: 30px">
                           <b >Số HĐ:</b> {{$order->code_bill}}<br>
                           <b>Ngày tạo HĐ:</b> {{$order->created_at->format('d/m/Y')}}
                        </div>
                    </div>
                </div>

                <div class="panel-body text-center" style="margin: 85px 0 8px 0">
                    <h1 class="panel-title" style="font-size: 28px;font-weight: bold">Hóa đơn thanh toán</h1>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">

                    <div style="width:90%; margin: 0 auto">
                        <div class="row form-group" style="margin-bottom: 5px; font-size: 15px">
                            <label class="col-sm-2 control-label" style="margin-right: -10px" for="demo-hor-name"><b>Họ tên khách hàng:</b> </label>

                                <span>{{$order->customer_name}}</span>
                        </div>
                        <div class="row form-group" style="margin-bottom: 14px; font-size: 15px">
                            <label class="col-sm-2 control-label" style="width: 195px" for="demo-hor-function"><b>Điện thoại khách hàng:</b> </label>
                            <span>{{$order->customer_phone}}</span>
                        </div>
                        <div class="row form-group" style="margin-top: -10px; margin-bottom: 14px; font-size: 15px">
                            <label class="col-sm-2 control-label" style="width: 195px" for="demo-hor-function"><b>Hình thức thanh toán:</b> </label>
                            <span>{{$order->payment_method}}</span>
                        </div>


                    </div>

                    <table class="table-bordered text-center" style="width:90%; line-height: 30px; margin: 0 auto">
                        <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Tên dịch vụ</th>
                                <th style="text-align: center">Tên thuốc</th>
                                <th style="text-align: center">Giá</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($services as $index => $service)
                            <tr>
                             <td>{{$index+1}}</td>
                             <td style="text-align: left; padding: 5px 15px;">{{$service->service_name}}</td>
                             <td></td>
                             <td>{{number_format($service->price)}} VNĐ</td>
                             </tr>
                            @endforeach
                            @foreach ($products as $index => $product)
                           <tr>
                            <td>{{$index+count($services)+1}}</td>
                            <td></td>
                            <td style="text-align: left; padding: 5px 15px;">{{$product->name}}</td>
                            <td>{{number_format($product->price)}} VNĐ</td>
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot class="text-center">
                            <tr>
                                <th style="text-align: center" colspan="3">Tổng tiền</th>
                                <th style="text-align: center">{{number_format($total)}} VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                    <p style="font-size: 16px; text-align: center; margin-top: 35px"><i>Cảm ơn bạn đã đến với Phòng khám nha khoa Đức Nghĩa</i></p>
                </div>
            </div>
            <div class="col-sm-12" style="text-align: right">
                <a style="margin: 5px; padding: 5px 10px" href="{{ route('order.pdf', $order->id) }}"
                    class="btn btn-primary">
                    Xuất hóa đơn
                </a>
            </div>
        </div>
    </div>
@endsection
