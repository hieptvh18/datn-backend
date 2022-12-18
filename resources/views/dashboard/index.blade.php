@extends('layout.master')

@section('page-title', 'Dashboard')

@section('page-content')
    <div class="row">
        <div class="col-lg-7">

            <!--Network Line Chart-->
            <!--===================================================-->
            <div id="demo-panel-network" class="panel">
                <div class="panel-heading" style="display: flex; align-items: center">
                    {{-- <div class="panel-control">
                        <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary"
                            data-toggle="panel-overlay" data-target="#demo-panel-network"><i
                                class="demo-psi-repeat-2"></i></button>
                        <div class="dropdown">
                            <button class="dropdown-toggle btn btn-default btn-active-primary" data-toggle="dropdown"
                                aria-expanded="false"><i class="demo-psi-dot-vertical"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div> --}}

                    <div style="padding-top: 15px; width: 32%">
                    <h3 class="panel-title">Thống kê</h3>
                    </div>
                    <div style="padding-top: 20px;">
                            <form autocomplete="off" >
                                <div class="row">
                                    <div id="demo-dp-range" class="col-sm-6" style="display: flex">
                                        <div class="input-daterange input-group" >
                                            <input id="datepicker"
                                                type="text" style="width: 120px" class="form-control"
                                                placeholder="Ngày bắt đầu" />
                                            <span class="input-group-addon">to</span>
                                            <input id="datepicker2"
                                                type="text" placeholder="Ngày kết thúc" style="width: 120px" class="form-control"/>
                                        </div>
                                        <div>
                                            <select id="changeFillter" style="width: 120px" class="form-control">
                                                <option value="">Chọn ngày</option>
                                                <option value="today">Hôm nay</option>
                                                <option value="7">7 Ngày trước</option>
                                                <option value="14">14 Ngày trước</option>
                                                <option value="30">30 Ngày trước</option>
                                                <option value="60">60 Ngày trước</option>
                                                <option value="90">90 Ngày trước</option>
                                                <option value="365">365 Ngày trước</option>
                                            </select>
                                        </div>
                                        <div class="btn-group col-sm-8">
                                            <a href=""><button class="btn btn-primary _btn_send_data">Lọc</button></a>
                                        </div>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>


                <!--chart placeholder-->
                <div class="pad-all">
                    {{-- <div id="demo-chart-network" style="height: 255px"></div> --}}
                    <div id="myfirstchart" style="height: 278px; padding: 0px;
                    position: relative;"></div>
                </div>


                <!--Chart information-->
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <p class="text-semibold text-uppercase text-main">THỜI TIẾT</p>
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="text-3x text-thin text-main">43.7</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">°C</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-7 text-sm">
                                    <p>
                                        <span>Min Values</span>
                                        <span class="pad-lft text-semibold">
                                            <span class="text-lg">27°</span>
                                            <span class="labellabel-success mar-lft">
                                                <i class="pci-caret-down text-success"></i>
                                                <smal>- 20</smal>
                                            </span>
                                        </span>
                                    </p>
                                    <p>
                                        <span>Max Values</span>
                                        <span class="pad-lft text-semibold">
                                            <span class="text-lg">69°</span>
                                            <span class="labellabel-danger mar-lft">
                                                <i class="pci-caret-up text-danger"></i>
                                                <smal>+ 57</smal>
                                            </span>
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="pad-rgt">
                                <p class="text-semibold text-uppercase text-main">Sắp xếp công việc khoa học</p>
                                <p class="text-muted mar-top">Việc đặt lịch hẹn online nhanh chóng mọi lúc mọi nơi giúp tăng sự chủ động tối đa về mặt thời gian cho các y bác sĩ, lễ tân và cả bệnh nhân đến khám chữa.</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <p class="text-uppercase text-semibold text-main">Băng thông sử dụng</p>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="media pad-btm">
                                        <div class="media-left">
                                            <span class="text-2x text-thin text-main">754.9</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Mbps</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="pad-btm">
                                    <div class="clearfix">
                                        <p class="pull-left mar-no">Income</p>
                                        <p class="pull-right mar-no">70%</p>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-info" style="width: 70%;">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <p class="pull-left mar-no">Outcome</p>
                                        <p class="pull-right mar-no">10%</p>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-primary" style="width: 10%;">
                                            <span class="sr-only">10% Complete</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <!--===================================================-->
            <!--End network line chart-->

        </div>
        <div class="col-lg-5">
            <div class="row"  style="margin: 0">
                {{-- <div class="col-sm-6 col-lg-6">

                    <!--Sparkline Area Chart-->
                    <div class="panel panel-success panel-colorful" >
                        <div class="pad-all">
                            <p class="text-lg text-semibold"><i class="demo-pli-data-storage icon-fw"></i> HDD Usage</p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">132Gb</span> Free Space
                            </p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">1,45Gb</span> Used space
                            </p>
                        </div>
                        <div class="pad-top text-center">
                            <!--Placeholder-->
                            <div id="demo-sparkline-area" class="sparklines-full-content"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">

                    <!--Sparkline Line Chart-->
                    <div class="panel panel-info panel-colorful">
                        <div class="pad-all">
                            <p class="text-lg text-semibold">Earning</p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">$764</span> Today
                            </p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">$1,332</span> Last 7 Day
                            </p>
                        </div>
                        <div class="pad-top text-center">

                            <!--Placeholder-->
                            <div id="demo-sparkline-line" class="sparklines-full-content"></div>

                        </div>
                    </div>
                </div> --}}
                <div class="bg-gray-light panel" id="myfirstchart1" style="height: 190px"></div>

            </div>
            <div class="row" style="margin: 0">
                {{-- <div class="col-sm-6 col-lg-6">

                    <!--Sparkline bar chart -->
                    <div class="panel panel-purple panel-colorful" >
                        <div class="pad-all">
                            <p class="text-lg text-semibold"><i class="demo-pli-basket-coins icon-fw"></i> Sales</p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">$764</span> Today
                            </p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">$1,332</span> Last 7 Day
                            </p>
                        </div>
                        <div class="text-center">

                            <!--Placeholder-->
                            <div id="demo-sparkline-bar" class="box-inline"></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">

                    <!--Sparkline pie chart -->
                    <div class="panel panel-warning panel-colorful" >
                        <div class="pad-all">
                            <p class="text-lg text-semibold">Task Progress</p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">34</span> Completed
                            </p>
                            <p class="mar-no">
                                <span class="pull-right text-bold">79</span> Total
                            </p>
                        </div>
                        <div class="pad-all">
                            <div class="pad-btm">
                                <div class="progress progress-sm">
                                    <div style="width: 45%;" class="progress-bar progress-bar-light">
                                        <span class="sr-only">45%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pad-btm">
                                <div class="progress progress-sm">
                                    <div style="width: 89%;" class="progress-bar progress-bar-light">
                                        <span class="sr-only">89%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="bg-gray-light panel" id="myfirstchart2" style="height: 190px"></div>
            </div>


            <!--Extra Small Weather Widget-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="panel">
                <div class="panel-body text-center clearfix">
                    <div class="col-sm-4 pad-top">
                        <div class="text-lg">
                            <p class="text-5x text-thin text-main">95</p>
                        </div>
                        <p class="text-sm text-bold text-uppercase">New Friends</p>
                    </div>
                    <div class="col-sm-8">
                        <button class="btn btn-pink mar-ver">View Details</button>
                        <p class="text-xs">Thành công bắt nguồn từ đam mê và sự tận tâm.</p>
                        <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main">1,345</span>
                                <p class="text-sm text-muted mar-no">Following</p>
                            </li>
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main">23K</span>
                                <p class="text-sm text-muted mar-no">Followers</p>
                            </li>
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main">278</span>
                                <p class="text-sm text-muted mar-no">Post</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Extra Small Weather Widget-->


        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-warning panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="demo-pli-file-word icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold" id="total_patient"></p>
                    <p class="mar-no">Số lượng bệnh nhân</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="demo-pli-file-zip icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold" id="total_schedule"></p>
                    <p class="mar-no">Số lượng đặt lịch</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="demo-pli-camera-2 icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold" id="total_sum"></p>
                    <p class="mar-no">Doanh thu tổng</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="demo-pli-video icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Videos</p>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('page-js')
    <script >
    $(document).ready(function () {
        $('#changeFillter').on('change', function (e) {
            e.preventDefault();
            var dateChange = $(this).val();
            var now = new Date();
            var to = new Date().toJSON().slice(0, 10);
            if(dateChange == 'today'){
                from = to
            }else{
                var from = new Date(now.setDate(now.getDate() - dateChange)).toJSON().slice(0, 10);
            }
            $.ajax({
                url: "{{route('schedules.chart')}}",
                type: "POST",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                dataType: "JSON",
                data: {date_from:from, date_to:to},
                success: function (data) {
                    chart.setData(data.schedule)
                    chart1.setData(data.patient)
                    chart2.setData(data.sum)
                }
            });
         });

         $('._btn_send_data').on('click', function (e) {
            e.preventDefault();
            var now = new Date().toJSON().slice(0, 10);
            var _token = $('input[name="_token"]').val();
            var date_from = $('#datepicker').val()
            var date_to = $('#datepicker2').val()
            var from = now;
            var to = now;
            if(date_from && date_to){
                from = date_from;
                to = date_to;
            }
            else if(date_from && !date_to){
                from = date_from
                to = date_from
            }

            $.ajax({
                url: "{{route('schedules.chart')}}",
                type: "POST",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                dataType: "JSON",
                data: {date_from:from, date_to:to},
                success: function (data) {
                    chart.setData(data.schedule)
                    chart1.setData(data.patient)
                    chart2.setData(data.sum)
                }
            });
        });

        defaultStatistic();

        var chart =  new Morris.Bar({
        element: 'myfirstchart',
        lineColors:['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors:['black'],
        fillOpacity:0.6,
        hiddeHover:'auto',
        parseTime: false,
        xkey: 'date',
        ykeys: ['schedule_count'],
        behaveLikeLine:true,
        labels: ['Số lượt đặt lịch']
        });

        var chart1 =  new Morris.Area({
        element: 'myfirstchart1',
        lineColors:['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors:['black'],
        fillOpacity:0.6,
        hiddeHover:'auto',
        parseTime: false,
        xkey: 'date',
        ykeys: ['patient_count'],
        behaveLikeLine:true,
        labels: ['Số người khám']
        });

        var chart2 =  new Morris.Line({
        element: 'myfirstchart2',
        lineColors:['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors:['black'],
        fillOpacity:0.6,
        hiddeHover:'auto',
        parseTime: false,
        xkey: 'date',
        ykeys: ['sum'],
        behaveLikeLine:true,
        labels: ['Doanh thu']
        });

        function defaultStatistic() {
            var now = new Date();
            var from = new Date(now.setDate(now.getDate() - 365)).toJSON().slice(0, 10);
            var to = new Date().toJSON().slice(0, 10);

            $.ajax({
                url: "{{route('schedules.chart')}}",
                type: "POST",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                dataType: "JSON",
                data: {date_from:from, date_to:to},
                success: function (data) {
                    chart.setData(data.schedule)
                    $("#total_patient").html(data.patient[0].patient_count);
                    $("#total_schedule").html(data.schedule[0].schedule_count);
                    $("#total_sum").html(numberWithCommas(data.sum[0].sum));

                    chart1.setData(data.patient)
                    chart2.setData(data.sum)
                }
            });
        };

    });
    </script>
    <script>
        var option = {
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dayNamesMin:['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
            dateFormat:"yy-mm-dd"
        }
        $('#datepicker').datepicker(option);
        $('#datepicker2').datepicker(option);
    </script>
@endsection

