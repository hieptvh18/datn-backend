<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    {{ __('Bạn vui lòng click vào nút bên dưới để lấy lại mật khẩu!') }}
                    {{__('Mã xác nhận của bạn là:') $token}}
                    {{ __('Lưu ý: Mã xác nhận chỉ có hiệu lực trong vòng 5 phút!') }},
                    <a href="{{ route('getChangePassword', $admin->id) }}"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('Lấy lại mật khẩu') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
