@extends('layout.auth')

@section('title', 'Đăng nhập')
@section('content')
<div class="col-md-6 col-lg-4">
    <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Bạn chưa có tài khoản ? Đăng kí tại đây</h3>

        <form method="POST" action="{{ route('postChangePassword', $admin->id) }}" class="signin-form">
            @csrf

            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="confirmPass" type="password" placeholder="Xác nhận mật khẩu"
                    class="form-control @error('confirmPass') is-invalid @enderror" name="confirmPass"
                    value="{{ old('confirmPass') }}" autocomplete="confirmPass" autofocus>

                @error('confirmPass')
                     <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="token" type="text" placeholder="Mã xác nhận"
                    class="form-control @error('token') is-invalid @enderror" name="token"
                    value="{{ old('token') }}" autocomplete="token" autofocus>

                @error('token')
                     <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Đặt lại mặt khẩu</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <a href="{{ route('getForgotPassword') }}" style="color: #fff">Đăng nhập</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
