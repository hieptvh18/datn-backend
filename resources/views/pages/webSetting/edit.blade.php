@extends('layout.master')
@section('page-title', 'Cập nhật thông tin phòng khám')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập nhật thông tin phòng khám</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form  action="{{ route('webSetting.update', $webSetting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="panel-body col-sm-6">

                        </div>
                        <div class="mb-3 col-sm-6" style="display: flex; justify-content:flex-end;margin-bottom:20px">

                            {{-- form send confirm send sms --}}

                            <button data-form="sendNotifi"  class="btn btn-primary btn-save-change">Lưu thay đổi</button>
                            <button class="btn btn-danger" type="reset">Khôi phục</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Tên website</b></label>
                                <input type="text" class="form-control" name="web_name"
                                    value="{{ $webSetting->web_name }}">
                            </div>
                            @error('web_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Link website</b></label>
                                <input type="text" class="form-control" name="base_url"
                                    value="{{ $webSetting->base_url }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Số điện thoại</b></label>
                                <input type="text" class="form-control" name="phones"
                                value="{{ $webSetting->phones }}">
                            </div>
                            @error('phones')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Email</b></label>
                                <input type="text" class="form-control" name="email" value="{{ $webSetting->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Facebook</b></label>
                                <input type="text" class="form-control" name="facebook_url" value="{{ $webSetting->facebook_url }}">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Twitter</b></label>
                                <input type="text" class="form-control" name="twitter_url" value="{{ $webSetting->twitter_url }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Instagram</b></label>
                                <input type="text" class="form-control" name="instagram_url" value="{{ $webSetting->instagram_url }}">
                            </div>

                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Youtobe</b></label>
                                <input type="text" class="form-control" name="youtobe_url" value="{{ $webSetting->youtobe_url }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Giờ mở cửa</b></label>
                                <input type="text" class="form-control" name="open_time" value="{{ $webSetting->open_time }}">
                            </div>
                            @error('open_time')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Giờ đóng cửa</b></label>
                                <input type="text" class="form-control" name="close_time" value="{{ $webSetting->close_time }}">
                            </div>
                            @error('close_time')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày bắt đầu làm việc trong tuần</b></label>
                                <input type="date" class="form-control" name="start_date" value="{{ $webSetting->start_date }}">
                            </div>
                            @error('start_date')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày kết thúc làm việc trong tuần</b></label>
                                <input type="date" class="form-control" name="end_date" value="{{ $webSetting->end_date }}">
                            </div>
                            @error('end_date')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Logo</b></label>
                                <input type="file" class="form-control" name="logo" onchange="preview()" />
                            </div>
                            @error('logo')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <img src="" id="previewImage" width="120px" alt="">
                        </div>
                        <div class="panel-body col-sm-6">
                            <label for=""><b>Ảnh cũ</b></label> <br>
                            <img src="{{asset($webSetting->logo)}}" width="120px" alt="">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ</b></label>
                            <textarea type="text" class="form-control" style="resize: none" rows="5" name="address">{{ $webSetting->address }}</textarea>
                        </div>
                        @error('address')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Giới thiệu ngắn</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="short_introduce">{{ $webSetting->short_introduce }}</textarea>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Giới thiệu chi tiết</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="introduce">{{ $webSetting->introduce }}</textarea>
                        </div>
                        @error('introduce')
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
