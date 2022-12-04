<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="http://localhost:3000/" class="navbar-brand">
                <img src="{{ asset($logoWeb->logo) }}" alt="DN Logo" width="100%" class="brand-icon">
                {{-- <img src="{{ asset('assets/img/logo-dn-new.png') }}" alt="DN Logo" width="100%" class="brand-icon"> --}}
                {{-- <div class="brand-title">
                    <span class="brand-text">DN</span>
                </div> --}}
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->



                <!--Search-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li>
                    <div class="custom-search-form">
                        <label class="btn btn-trans" for="search-input" data-toggle="collapse"
                            data-target="#nav-searchbox">
                            <i class="demo-pli-magnifi-glass"></i>
                        </label>
                        {{-- <form>
                            <div class="search-container collapse" id="nav-searchbox">
                                <input id="search-input" type="text" class="form-control"
                                    placeholder="Type for search...">
                            </div>
                        </form> --}}
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Search-->

            </ul>
            <ul class="nav navbar-top-links">

                <!--Language-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-Language" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">
                            <i class="fa fa-language"></i>
                        </span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li class="demo-icon">
                                <a href=""><i class="flag-icon flag-icon-vn"></i><span> Việt Nam</span></a>
                            </li>
                            <li>
                                <a href=""><i class="flag-icon flag-icon-us"></i><span> English</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End language-->


                <!--Mega dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="mega-dropdown">
                    <a href="#" class="mega-dropdown-toggle">
                        <i class="demo-pli-layout-grid"></i>
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <!--Bordered Accordion-->
                                <!--===================================================-->
                                <div class="panel-group accordion" id="demo-acc-info-outline">
                                    <div class="panel panel-bordered panel-info">
                                        <!--Accordion title-->
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                    href="#acd-info-outline-1">Quản trị viên</a>
                                            </h4>
                                        </div>

                                        <!--Accordion content-->
                                        <div class="panel-collapse collapse in" id="acd-info-outline-1">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @can('permission-list')
                                                        <li><a href="{{ route('permissions.index') }}">Danh sách quyền</a>
                                                        </li>
                                                    @endcan
                                                    @can('role-list')
                                                        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
                                                    @endcan
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    @can('admin-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-2">Người dùng</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-2">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('account_admins.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('account_admins.create') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('schedule-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-3">Đặt lịch</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-3">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('schedules.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('schedules.create') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('patient-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-4">Bệnh án</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-4">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('patient.index') }}">Danh sách</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('order-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-5">Hóa đơn</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-5">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('order.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('order.add') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                                <!--===================================================-->
                                <!--End Bordered Accordion-->
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <!--Bordered Accordion-->
                                <!--===================================================-->
                                <div class="panel-group accordion" id="demo-acc-info-outline">
                                    @can('equipment-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-6">Trang thiết bị</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-6">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('equipment.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('equipment.add') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('level-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-7">Chức vụ</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-7">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('level.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('level.add') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('specialist-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-8">Chuyên khoa</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-8">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('specialist.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('specialist.add') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('room-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-9">Phòng ban</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-9">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('rooms.index') }}">Danh sách</a></li>
                                                        <li><a href="{{ route('rooms.create') }}">Thêm mới</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('service-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-10">Dịch vụ</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-10">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('service.index') }}">Danh sách dịch vụ</a>
                                                        </li>
                                                        <li><a href="{{ route('service.create') }}">Thêm dịch vụ</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                                <!--===================================================-->
                                <!--End Bordered Accordion-->
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <!--Bordered Accordion-->
                                <!--===================================================-->
                                <div class="panel-group accordion" id="demo-acc-info-outline">
                                    @can('product-list')
                                        <div class="panel panel-bordered panel-info">
                                            <!--Accordion title-->
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                        href="#acd-info-outline-11">Sản phẩm</a>
                                                </h4>
                                            </div>

                                            <!--Accordion content-->
                                            <div class="panel-collapse collapse in" id="acd-info-outline-11">
                                                <div class="panel-body">
                                                    <ul style="list-style-type: none;">
                                                        <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                                                        <li><a href="{{ route('product-type.index') }}">Loại sản phẩm</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    <div class="panel panel-bordered panel-info">
                                        <!--Accordion title-->
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                    href="#acd-info-outline-12">Tin tức</a>
                                            </h4>
                                        </div>

                                        <!--Accordion content-->
                                        <div class="panel-collapse collapse in" id="acd-info-outline-12">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    <li><a href="{{ route('newCategories.index') }}">Danh mục tin</a>
                                                    </li>
                                                    <li><a href="{{ route('news.index') }}">Bài viết</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-bordered panel-info">
                                        <!--Accordion title-->
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                    href="#acd-info-outline-13">Cài đặt chung</a>
                                            </h4>
                                        </div>

                                        <!--Accordion content-->
                                        <div class="panel-collapse collapse in" id="acd-info-outline-13">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    <li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
                                                    <li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Bordered Accordion-->
                            </div>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End mega dropdown-->



                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown notifi-wrapper">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="demo-pli-bell"></i>
                        <span data-count="0" class="count-noti badge badge-header badge-danger"></span>
                    </a>


                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <div class="nano scrollable">
                            <div class="nano-content">
                                <ul class="head-list notification-dropdown">

                                </ul>
                            </div>
                        </div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top view-all-noti">

                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->



                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--You can use an image instead of an icon.-->
                            <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <i class="demo-pli-male"></i>
                        </span>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--You can also display a user name in the navbar.-->
                        <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    </a>


                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{route('webSetting.edit')}}"><i
                                        class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                            </li>
                            @if (Auth::guard('admin')->check())
                                <li>
                                    {{-- <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i>
                                    Logout</a> --}}
                                    <form id="deleteForm" action="{{ route('logout') }}" method="post">
                                        @csrf

                                    </form>
                                    <button data-form="deleteForm" class="btn btn-block logout"
                                        style="text-align: left"><i
                                            class="demo-pli-unlock icon-lg icon-fw"></i>Logout</button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->


            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>

{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>


{{-- js custom pusher --}}
{{-- @section('page-js') --}}
<script type="text/javascript">
    // var notificationsWrapper   = $('.dropdown-notifications');
    // var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = $('li.notifi-wrapper span.count-noti');
    var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = $('ul.notification-dropdown');
    var viewAllNoti = $('.view-all-noti');
    var viewAllNotiHtml = `<a href="#" class="btn-link text-main box-block">
                                <i class="pci-chevron chevron-right pull-right"></i>Xem tất cả thông báo<a>`;

    if(notifications.find('li').length > 5){
        viewAllNoti.html(viewAllNotiHtml);
    }
    if(notifications.find('li').length == 0){
        viewAllNoti.html(`<div class="btn-link text-main box-block">
                                Chưa có thông báo </div>`);
    }

    // if (notificationsCount <= 0) {
    //     notificationsWrapper.hide();
    // }

    //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này nhé
    var pusher = new Pusher('15b47501777b1198f867', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('development');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NoticeBookingEvent', function(data) {
        console.log(data);
        var existingNotifications = notifications.html();
        var linkNoti = data.getScheduleDetailUrl;
        var newNotificationHtml = `
            <li class="dropdown-notifications_item">
                <a class="media" href="${linkNoti}">
                    <div class="media-left">
                        <i class="demo-pli-add-user-star icon-2x"></i>
                           </div>
                               <div class="media-body">
                                <p style="word-wrap: break-word;" class="mar-no text-nowrap text-main text-semibold">${data.message}</p>
                        <small>1 phút trước</small>
                    </div>
                </a>
            </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsCountElem.html(notificationsCount);
        // notificationsWrapper.find('.notif-count').text(notificationsCount);
        // notificationsWrapper.show();
    });
</script>
{{-- @endsection --}}
