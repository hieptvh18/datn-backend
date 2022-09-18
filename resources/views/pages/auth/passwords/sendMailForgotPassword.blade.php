@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đặt lại mật khẩu') }}</div>

                    <div class="card-body">


                        <h3>Bạn vui lòng click vào link bên dưới để lấy lại mật khẩu!</h3>
                        <h4>
                            <b>Mã xác nhận của bạn là:</b> {{ $token }}
                        </h4>
                        <a href="{{ route('getChangePassword', $admin->id) }}"
                            class="btn btn-primary">{{ __('Lấy lại mật khẩu') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
