<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('page-title')</title>


<!--STYLESHEET-->
<!--=================================================-->

<!--Open Sans Font [ OPTIONAL ]-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


<!--Bootstrap Stylesheet [ REQUIRED ]-->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


<!--Nifty Stylesheet [ REQUIRED ]-->
<link href="{{ asset('assets/css/nifty.min.css') }}" rel="stylesheet">


<!--Nifty Premium Icon [ DEMONSTRATION ]-->
<link href="{{ asset('assets/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">

{{-- ==== schedule --}}
<!--Pace - Page Load Progress Par [OPTIONAL]-->
<link href="{{asset('assets/plugins/pace/pace.min.css')}}" rel="stylesheet">
<script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>


<!--Demo [ DEMONSTRATION ]-->
<link href="{{asset('assets/css/demo/nifty-demo.min.css')}}" rel="stylesheet">

<!--Switchery [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">


<!--Bootstrap Select [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">


<!--Bootstrap Tags Input [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">


<!--Chosen [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/chosen/chosen.min.css') }}" rel="stylesheet">


<!--noUiSlider [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet">

<!--Select2 [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">


<!--Bootstrap Timepicker [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">


<!--Bootstrap Datepicker [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

<!--Ion Icons [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

<!--Font Awesome [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">