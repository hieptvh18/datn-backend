@extends('layout.master')
@section('page-title', 'Chi tiết hóa đơn')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Chi tiết hóa đơn</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">

                    <div class="table-responsive">
                        @if (session('exception'))
                            <div class="alert alert-danger">{{ session('exception') }}</div>
                        @endif

                            <div class="panel-body">
                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label class="col-sm-2 control-label" for="demo-hor-name"><b>Họ tên:</b> </label>

                                        <span>{{$order->customer_name}}</span>
                                </div>
                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label class="col-sm-2 control-label" for="demo-hor-function"><b>Điện thoại:</b> </label>
                                    <span>{{$order->customer_phone}}</span>
                                </div>


                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label for="description" class="ckeditor col-sm-2 control-label"><b>Mô tả:</b> </label>

                                        <span>{{$order->description}}</span>

                                </div>
                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label for="description" class="col-sm-2 control-label"><b>Thuốc:</b> </label>

                                        @foreach  ($products as $product)
                                        <div>
                                            {{$product->name}}: &nbsp; <b>Giá: </b> {{number_format($product->price)}} VNĐ
                                         </div>
                                        @endforeach

                                </div>
                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label for="address" class="col-sm-2 control-label"><b>Dịch vụ:</b> </label>
                                        @foreach  ($services as $service)
                                        <div style="line-height: 23px">
                                           {{$service->service_name}}: &nbsp; <b>Giá: </b> {{number_format($service->price)}} VNĐ
                                        </div>
                                        @endforeach

                                </div>
                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label for="address" class="col-sm-2 control-label"><b>Tổng tiền:</b> </label>

                                      <span>{{number_format($total)}} VNĐ</span>

                                </div>

                                <div class="row form-group" style="margin-bottom: 15px">
                                    <label for="description" class="col-sm-2 control-label"><b>Phương thức thanh toán:</b> </label>

                                      <span>Tiền mặt</span>

                                </div>

                            </div>
                            <div class="panel-footer text-right">
                                <a href="{{ route('order.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">

                        {{-- {{ $patients->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
