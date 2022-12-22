@extends('layout.master')
@section('page-title', 'Lịch khám')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $pageTitle }}</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form name="formPostUpdateSchedule" id="sendNotifi" action="{{ route('schedules.update', $schedule->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3 ">
                                <label for="" class="form-label"><b>Trạng thái</b></label>

                                <div class="radio">
                                    <input id="form-radio1" value="0" class="magic-radio" type="radio" name="status"
                                        {{ !$schedule->status ? 'checked' : '' }}>
                                    <label for="form-radio1"> <span class="label label-purple"> Chờ xác nhận</span></label>
                                </div>
                                <div class="radio">
                                    <input id="form-radio2" value="1" class="magic-radio" type="radio" name="status"
                                        {{ $schedule->status == 1 ? 'checked' : '' }}>
                                    <label for="form-radio2"> <span class="label label-info"> Đã xác nhận</span></label>
                                </div>
                                <div class="radio">
                                    <input id="form-radio3" value="2" class="magic-radio" type="radio" name="status"
                                        {{ $schedule->status == 2 ? 'checked' : '' }}>
                                    <label for="form-radio3"><span class="label label-danger"> Đã hủy lịch</span></label>
                                </div>
                                <div class="radio">
                                    <input id="form-radio4" value="3" class="magic-radio" type="radio" name="status"
                                        {{ $schedule->status == 3 ? 'checked' : '' }}>
                                    <label for="form-radio4"><span class="label label-success"> Đã khám</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6" style="display: flex; justify-content:flex-end;margin-bottom:20px">

                            {{-- form send confirm send sms --}}

                            <button data-form="sendNotifi" type="button" class="btn btn-primary btn-save-change">Lưu thay đổi</button>
                            <button class="btn btn-danger" type="reset">Khôi phục</button>
                            <a href="{{ route('schedules.index') }}" class="btn btn-info">Quay lại</a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Họ tên</b></label>
                                <input type="text" class="form-control" name="fullname"
                                    value="{{ $schedule->fullname }}">
                            </div>
                            @error('fullname')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày sinh</b></label>
                                <input type="text" id="datepickerFuture" class="form-control" name="birthday"
                                    value="{{ date('d-m-Y', strtotime($schedule->birthday))}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Giới tính</b></label>
                                <select name="gender" class="form-control" id="">
                                    <option {{ $schedule->gender ==1 ? 'selected' : '' }} value="1">Nam</option>
                                    <option {{ $schedule->gender == 2 ? 'selected' : '' }} value="2">Nữ</option>
                                    <option {{ $schedule->gender == 3 ? 'selected' : '' }} value="3"></option>
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
                                <input type="text" class="form-control" name="phone" value="{{ $schedule->phone }}">
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
                                <input type="text" class="form-control" name="email" value="{{ $schedule->email }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày hẹn</b></label>
                                <input type="text" id="datepickerPast" class="form-control" name="date" value="{{date('d-m-Y', strtotime($schedule->date))}}" />
                            </div>
                            @error('date')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="service_id" class="form-label"><b>Dịch vụ</b></label>
                                <div class="checkbox">
                                    <select class="js-example-basic-multiple form-control" data-placeholder="Chọn dịch vụ..."
                                    name="service_id[]" multiple="multiple">
                                    @foreach ($services as $service)
                                        <option
                                            value="{{ $service->id }}"  {{ $schedule->services_schedule->contains('id', $service->id) ? 'selected':'' }}>{{ $service->service_name }}</option>
                                    @endforeach
                                </select>


                            </div>
                            @error('service_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        {{--  --}}

                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Quê quán</b></label>
                            <textarea type="text" class="form-control" style="resize: none" rows="5" name="address">{{ $schedule->address }}</textarea>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Nội dung</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="content">{{ $schedule->content }}</textarea>
                        </div>
                        @error('content')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection
@section('page-js')
    <script>
        $(document).ready(function(){
            $('.btn-save-change').click(function(e){
                // sttaus == confirm
                if($('input[name=status]:checked').val() == 1){
                    // => display pop confirm
                    $(this).addClass('confirm-sms');
                }else{
                    $(this).removeClass('confirm-sms');
                    $('form#sendNotifi').submit();
                    // $('form[name=formPostUpdateSchedule]').submit();
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
