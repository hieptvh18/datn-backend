<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <style type="text/css">

    *{
        margin: 0;
        padding: 0;
    }
        body {font-family: 'Dejavu Sans' !important}
        .container{
            width: 730px;
            padding: 40px 30px;
        }
        .row{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        .title{
            text-align: center;
            margin: 30px 0 20px 0;
        }

        .content .top-content {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        table, th,td{
            text-align: center;
            border-collapse: collapse;
            border: 1px solid #333;
        }
        p{
            text-align: center;
            margin: 20px 0 10px 0;
        }

    </style>
    <title>Document</title>
</head>
<body>
        <div class="container">
                <div class="header">
                    <div class="row" style="">
                        <div class="item" style="margin: -40px 0 0 -60px">
                            <img src="{{$pic}}" width="200px" alt="">
                        </div>
                        <div class="item1" style="line-height: 15px; text-align: center; margin: -130px 20px 0 0; font-size: 13px">
                         <b >PHÒNG KHÁM NHA KHOA ĐỨC NGHĨA </b> <br>
                             Địa chỉ: Trịnh Văn Bô - Nam từ liêm - Hà Nội <br>
                          Số điện thoại: 18001001
                        </div>
                        <div class="col-sm-3" style="text-align: right; line-height: 15px; font-size: 10px; margin: -130px 0 0 0">
                           <b >Số HĐ:</b> {{$order->code_bill}}<br>
                           <b>Ngày tạo HĐ:</b> {{$order->created_at->format('d/m/Y')}}
                        </div>
                    </div>
                </div>

                <div class="title">
                    <h1 >Hóa đơn thanh toán</h1>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="content">

                    <div class="top-content">
                        <div >
                            <label><b>Họ tên khách hàng:</b> </label>

                                <span>{{$order->customer_name}}</span>
                        </div>
                        <div >
                            <label ><b>Điện thoại khách hàng:</b> </label>
                            <span>{{$order->customer_phone}}</span>
                        </div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th >STT</th>
                                <th >Tên dịch vụ</th>
                                <th >Tên thuốc</th>
                                <th >Hướng dẫn sử dụng</th>
                                <th >Giá</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($services as $index => $service)
                            <tr>
                             <td>{{$index+1}}</td>
                             <td style="text-align: left; padding-left: 12px">{{$service->service_name}}</td>
                             <td></td>
                             <td></td>
                             <td>{{number_format($service->price)}} VNĐ</td>
                             </tr>
                            @endforeach
                            @foreach ($products as $index => $product)
                           <tr>
                            <td>{{$index+count($services)+1}}</td>
                            <td></td>
                            <td style="text-align: left; padding-left: 12px">{{$product->name}}</td>
                            <td>
                               @foreach ($arrHdsd as $hd)
                                        @if ($hd[0] == $product->id)
                                            {{ltrim($hd[1])}}
                                        @endif
                                    @endforeach
                            </td>
                            <td>{{number_format($product->price)}} VNĐ</td>
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot >
                            <tr>
                                <th  colspan="4">Tổng tiền</th>
                                <th >{{number_format($total)}} VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                    <p ><i>Cảm ơn bạn đã đến với Phòng khám nha khoa Đức Nghĩa</i></p>
                </div>
        </div>

</body>
</html>
