@extends('layout.auth')

@section('title', 'Đăng nhập')
@section('content')
<div class="col-md-6 col-lg-4">
    <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Nha khoa Đức Nghĩa</h3>

        <form method="POST" action="{{ route('postLogin') }}" class="signin-form">
            @csrf
            <div class="form-group">
                <input id="email" type="text" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ Cookie::get('emailCookie')?Cookie::get('emailCookie'):old('email') }}" autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password" value="{{Cookie::get('passwordCookie')?Cookie::get('passwordCookie'):old('password')}}">

                @error('password')
                    <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng
                    nhập</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Ghi nhớ tài khoản
                        <input type="checkbox" checked name="remember">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="{{ route('getForgotPassword') }}" style="color: #fff">Quên mật khẩu</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
