@extends('layout.master')
@section('page-title', 'Lịch khám')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tạo mới lịch khám</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form name="formPostUpdateSchedule" id="sendNotifi" action="{{route('reBooking.save')}}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Trạng thái</b></label>
                            <div class="radio">
                                <input id="form-radio5" value="1" checked class="magic-radio" type="radio" name="status">
                                <label for="form-radio5"><span class="label label-success"> Khám lại</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Họ tên</b></label>
                                <input type="text" placeholder="Tên đầy đủ"
                                    class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                    value="{{$patient->customer_name}}" autocomplete="fullname" autofocus>
                            </div>
                            @error('fullname')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Năm sinh</b></label>
                                <input type="text" id="datepickerFuture" class="form-control" name="birthday" value="{{$patient->birthday}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Giới tính</b></label>
                                <select name="gender" class="form-control" id="">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3"></option>
                                </select>
                            </div>
                            @error('gender')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Điện thoại</b></label>
                                <input type="text" class="form-control" name="phone" value="{{$patient->phone}}">
                            </div>
                            @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Email</b></label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>CMND</b></label>
                                <input type="text" class="form-control" name="cmnd" value="{{$patient->cmnd}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày hẹn</b></label>
                                <input type="text" class="form-control" id="datepickerPast" name="date" value="{{old('date')}}"/>
                            </div>
                            @error('date')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="service_id" class="form-label"><b>Dịch vụ</b></label>
                                <div class="checkbox">
                                    <select class="js-example-basic-multiple form-control" data-placeholder="Chọn dịch vụ..."
                                    name="service_id[]" multiple="multiple">
                                    @foreach ($services as $service)
                                        <option
                                            value="{{ $service->id }}"  {{ (collect(old('service_id'))->contains($service->id)) ? 'selected':'' }}>{{ $service->service_name }}</option>
                                    @endforeach
                                </select>


                            </div>
                            @error('service_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Nội dung</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="content">{{old('content')}}</textarea>
                        </div>
                        @error('content')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Quê quán</b></label>
                            <textarea type="text" class="form-control" style="resize: none" rows="5" name="address" >{{$patient->address}}</textarea>
                        </div>
                    </div>


                    <button data-form="sendNotifi" type="button" class="confirm-sms btn btn-primary">Lưu thay đổi</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <a href="{{ route('schedules.index') }}" class="btn btn-info">Back</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

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
