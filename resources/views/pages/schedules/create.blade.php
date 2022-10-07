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
                <form action="{{ route('schedules.store') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Trạng thái</b></label>

                            {{-- <div class="radio">
                                <input id="form-radio1" value="0" class="magic-radio" type="radio" name="status" checked>
                                <label for="form-radio1" > <span class="label label-purple"> Chờ xác nhận</span></label>
                            </div> --}}
                            <div class="radio">
                                <input id="form-radio2" value="1" checked class="magic-radio" type="radio" name="status" >
                                <label for="form-radio2" > <span class="label label-info"> Đã xác nhận</span></label>
                            </div>
                            {{-- <div class="radio">
                                <input id="form-radio3" value="2" class="magic-radio" type="radio" name="status" >
                                <label for="form-radio3" ><span class="label label-danger"> Đã hủy lịch</span></label>
                            </div>
                            <div class="radio">
                                <input id="form-radio4" value="3" class="magic-radio" type="radio" name="status">
                                <label for="form-radio4"><span class="label label-success"> Đã khám</span></label>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Họ tên</b></label>
                                <input type="text" placeholder="Tên đầy đủ"
                                    class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                    value="{{ old('fullname') }}" autocomplete="fullname" autofocus>
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
                                <input type="date" class="form-control" name="birthday" value="{{old('birthday')}}">
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
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
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
                                <input type="text" class="form-control" name="cmnd" value="{{old('cmnd')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày hẹn</b></label>
                                <input type="date" class="form-control" name="date" value="{{old('date')}}"/>
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
                                    @foreach ($services as $service)
                                        <input name="service_id[]" 
                                        @if(is_array(old('service_id')) && in_array($service->id, old('service_id'))) checked @endif
                                        value="{{$service->id}}"
                                        id="demo-form-inline-checkbox-{{$service->id}}" class="magic-checkbox" type="checkbox">
                                        <label for="demo-form-inline-checkbox-{{$service->id}}">{{$service->service_name}}</label>
                                    @endforeach
                                </div>
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
                            <textarea type="text" class="form-control" style="resize: none" rows="5" name="address" >{{old('address')}}</textarea>
                        </div>
                    </div>


                    <button class="btn btn-primary">Save</button>
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
