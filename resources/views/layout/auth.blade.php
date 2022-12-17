<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url({{ asset('assets/img/bg.jpg') }});">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">@yield('title')</h2>
                </div>
            </div>
            <div class="row justify-content-center">
               @yield('content')
            </div>
            {{-- <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Bạn chưa có tài khoản ? Đăng kí tại đây</h3>

                        <form method="POST" action="{{ route('postLogin') }}" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="text" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
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
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
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
            </div> --}}
        </div>
    </section>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- alert message --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('message'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if (session('error'))
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: true,
                timer: 6000
            })
        @endif
    </script>

</body>

</html>
