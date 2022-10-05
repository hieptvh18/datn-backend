@extends('layout.master')
@section('page-title', 'Cập nhật bệnh án')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{route('patient.index')}}" class="ml-3" style="margin-left: 20px"><- Quay về </a>
        </div>

        <form action="{{ route('patient.update',$patient->id) }}" class="form-horizontal" method="POST" >
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Họ tên(*)</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên bệnh nhân" id="demo-hor-name" name="customer_name"
                            class="form-control" value="{{ $patient->customer_name }}">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Điện thoại(*)</label>
                    <div class="col-sm-9">
                        <input type="tel" name="phone" placeholder="Số điện thoại" id="phone" value="{{$patient->phone}}" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Năm sinh(*)</label>
                    <div class="col-sm-9">
                        <input type="date" value="{{$patient->birthday}}" name="birthday" id="birthday" class="form-control">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">CMND/CCCD(*)</label>
                    <div class="col-sm-9">
                        <input type="number" name="cmnd" id="cmnd" class="form-control" value="{{$patient->cmnd}}" placeholder="Số chứng minh nhân dân/Căn cước công dân">
                        @error('cmnd')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Mô tả bệnh tình">{{ $patient->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Quê quán</label>
                    <div class="col-md-9">
                        <textarea name="address" id="address" cols="30" placeholder="Quê quán" rows="5" class="form-control">{{$patient->address }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Bác sĩ</label>
                    <div class="col-md-9">
                        <select class="js-example-basic-multiple form-control" data-placeholder="Chọn bác sĩ..."
                            name="doctor[]" multiple="multiple">
                            @foreach ($doctors as $doctor)
                                <option {{ $patient->patient_doctors->contains('id', $doctor->id) ? 'selected' : '' }} value="{{ $doctor->id }}">{{ $doctor->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Thuốc</label>
                    <div class="col-md-9">
                        <select class="js-example-basic-multiple form-control" data-placeholder="Chọn thuốc..."
                            name="product[]" multiple="multiple">
                            @foreach ($products as $product)
                                <option {{ $patient->patient_products->contains('id', $product->id) ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Dịch vụ</label>
                    <div class="col-md-9" style="margin-top: 5px">
                        <select class="js-example-basic-multiple form-control" data-placeholder="Chọn dịch vụ..."
                            name="service[]" multiple="multiple">
                            @foreach ($services as $service)
                                <option {{ $patient->service_patients->contains('id', $service->id) ? 'selected' : '' }}
                                    value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Ngày khám</label>
                    <div class="col-md-9">
                        <input type="date" name="date" value="{{$patient->date}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>------Chọn trạng thái------</option>
                            <option {{$patient->status == 0 ? 'selected' : ""}} value="0">Đã khám</option>
                            <option {{$patient->status == 1 ? 'selected' : ""}} value="1">Chưa điều trị</option>
                            <option {{$patient->status == 2 ? 'selected' : ""}} value="2">Đã điều trị</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="created_at">Ngày tạo</label>
                <div class="col-sm-9">
                    <input type="text" disabled name="created_at"  id="created_at" value="{{$patient->created_at}}" class="form-control">
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
