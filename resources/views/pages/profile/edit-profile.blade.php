@extends('layout.master')
@section('page-title', 'Chỉnh sửa hồ sơ cá nhân')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Chỉnh sửa hồ sơ cá nhân</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Email</b></label>
                                <input type="text" class="form-control" readonly name="email" value="{{$profile->email}}" autocomplete="email" autofocus placeholder="Email...">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Họ và tên</b></label>
                                <input type="text" class="form-control"  value="{{$profile->fullname}}" name="fullname" autocomplete="fullname" autofocus placeholder="Fullname...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ngày sinh</b></label>
                                <input type="date" class="form-control"  name="birthday" value="{{$profile->birthday}}" autocomplete="birthday" autofocus placeholder="Birthday...">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>SĐT</b></label>
                                <input type="text" class="form-control" readonly name="phone" value="{{$profile->phone}}" autocomplete="phone" autofocus placeholder="Phone...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Địa chỉ</b></label>
                                <input type="text" class="form-control"  name="address" value="{{$profile->address}}" autocomplete="address" autofocus placeholder="Address...">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Địa chỉ Facebook</b></label>
                                <input type="text" class="form-control"  name="facebook_url" value="{{$profile->facebook_url}}" autocomplete="facebook_url" autofocus placeholder="Facebook_url...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Địa chỉ Twitter</b></label>
                                <input type="text" class="form-control"  name="twitter_url" value="{{$profile->twitter_url}}" autocomplete="twitter_url" autofocus placeholder="Twitter_url...">
                            </div>
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Địa chỉ Email</b></label>
                                <input type="text" class="form-control"  name="email_url" value="{{$profile->email_url}}"  autocomplete="email_url" autofocus placeholder="Email_url...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ảnh</b></label>
                                <input type="file" class="form-control" name="avatar" onchange="preview()"  autocomplete="avatar" autofocus>
                                <img src="" id="previewImage" width="120px" alt="">
                            </div>
                            @error('avatar')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="panel-body col-sm-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><b>Ảnh cũ</b></label>
                                <img src="{{asset($profile->avatar)}}" width="120px" alt="">
                            </div>

                        </div>
                    </div>
<div class="row text-right" style="padding: 0 25px 15px 0 ">
    <button class="btn btn-primary">Lưu</button>
</div>
</form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

