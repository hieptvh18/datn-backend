@extends('layout.auth')

@section('title', "Quên mật khẩu")
@section('content')
    <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
            <h3 class="mb-4 text-center">Nhập email đã đăng ký trong hệ thống</h3>

            <form method="POST" action="{{ route('postForgotPassword') }}" class="signin-form">
                @csrf
                <div class="form-group">
                    <input id="email" type="text" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" autocomplete="email"  autofocus>

                    @error('email')
                        <span class="invalid-feedback ml-2" role="alert" style="color: yellow">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3">Lấy lại mật khẩu</button>
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-50">
                        <a href="{{ route('getLogin') }}" style="color: #fff">Đăng nhập</a>
                        </label>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
