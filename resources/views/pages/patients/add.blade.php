@extends('layout.master')
@section('page-title', 'Thêm bệnh án')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{route('patient.index')}}" class="ml-3" style="margin-left: 20px"><- Quay về </a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{session('exception')}}</div>
        @endif
        <form action="{{ route('patient.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Họ tên(*)</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="schedule_id"
                            class="form-control" value="{{ $patient->id }}">
                        <input type="text" placeholder="Tên bệnh nhân" id="demo-hor-name" name="customer_name"
                            class="form-control" value="{{ $patient->fullname }}">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Điện thoại(*)</label>
                    <div class="col-sm-9">
                        <input type="tel" name="phone" placeholder="Số điện thoại" id="phone" value="{{ $patient->phone }}" class="form-control">
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
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Mô tả bệnh tình">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Quê quán</label>
                    <div class="col-md-9">
                        <textarea name="address" id="address" cols="30" placeholder="Quê quán" rows="5" class="form-control">{{$patient->address}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Dịch vụ</label>
                    <div class="col-md-9" style="margin-top: 5px">
                        @foreach  ($services as $service)
                        <div>
                            @foreach  ($service->subService as $subService)
                            <input type="checkbox" {{$patient->services_schedule->contains('id', $service->id)?"checked":""}} name="service[]" value="{{$service->id}}"> {{$service->service_name}}: &nbsp;

                            <input type="checkbox" {{$patient->services_schedule->contains('id', $subService->id)?"checked":""}} name="service[]" value="{{$subService->id}}"> {{$subService->service_name}} &nbsp;
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>------Chọn trạng thái------</option>
                            <option {{old('status') == 0 ? 'selected' : ""}} value="0">Đã khám</option>
                            <option {{old('status') == 1 ? 'selected' : ""}} value="1">Chưa điều trị</option>
                            <option {{old('status') == 2 ? 'selected' : ""}} value="2">Đã điều trị</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
