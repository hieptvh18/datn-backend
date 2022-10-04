@extends('layout.master')
@section('page-title', 'Tạo hóa đơn')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Tạo hóa đơn</h3>
            <a href="{{route('order.index')}}" class="ml-3" style="margin-left: 20px"><- Quay về </a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{session('exception')}}</div>
        @endif
        <form action="{{ route('order.store', ['id'=>$patient->id]) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Họ tên(*)</label>
                    <div class="col-sm-9">

                        <input type="text" placeholder="Tên bệnh nhân" id="demo-hor-name" name="customer_name"
                            class="form-control" value="{{$patient->customer_name}}">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Điện thoại(*)</label>
                    <div class="col-sm-9">
                        <input type="tel" name="customer_phone" placeholder="Số điện thoại" id="phone" value="{{$patient->phone}}" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="ckeditor form-control" placeholder="Mô tả bệnh tình">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Thuốc</label>
                    <div class="col-md-9">
                        @foreach  ($products as $product)
                        <div class="Card">
                            <input type="checkbox" class="Parent" name="product_name[]" value="{{$product->name}}"> {{$product->name}} =
                            <input type="checkbox" class="Childrent" name="product_price[]" value="{{$product->price}}">
                            {{number_format($product->price)}} VNĐ ;

                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Dịch vụ</label>
                    <div class="col-md-9" style="margin-top: 5px">

                        @foreach  ($services as $service)
                        <div class="Card">
                            @foreach  ($service->subService as $subService)
                            <input type="checkbox" class="Parent" name="service_name[]" {{$patient->service_patients->contains('service_name', $service->service_name)?"checked":""}} value="{{$service->service_name}}"> {{$service->service_name}} =
                            <input type="checkbox" class="Childrent" name="service_price[]" {{$patient->service_patients->contains('price', $service->price)?"checked":""}} value="{{$service->price}}">
                             {{number_format($service->price)}} VNĐ &nbsp; | &nbsp;
                            <input type="checkbox" class="SubParent" name="service_name[]" {{$patient->service_patients->contains('service_name', $subService->service_name)?"checked":""}} value="{{$subService->service_name}}"> {{$subService->service_name}} =
                            <input type="checkbox" class="SubChildrent" name="service_price[]" {{$patient->service_patients->contains('price', $subService->price)?"checked":""}} value="{{$subService->price}}">
                            {{number_format($subService->price)}} VNĐ &nbsp;;
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Phương thức thanh toán</label>
                    <div class="col-md-9">
                        <select name="payment_method" class="form-control" id="">
                            <option value="tiền mặt">Tiền mặt</option>
                            <option value="chuyển khoản">Chuyển khoản</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn btn-black" type="reset">Reset</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>

@endsection
@section('page-js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
