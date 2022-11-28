<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->



        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                @if (Auth::check())
                                    <img class="img-circle img-md" src="{{ asset(Auth::user()->avatar) }}"
                                    alt="Profile Picture">
                                @endif

                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                @if (Auth::check())
                                    <p class="mnp-name">{{ Auth::user()->fullname }}</p>
                                    <span class="mnp-desc">{{ Auth::user()->email }}</span>
                                @endif
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="{{ route('profile.show', Auth::guard('admin')->user()->id) }}"
                                class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <form id="deleteForm" action="{{ route('logout') }}" method="post">
                                @csrf

                            </form>
                            <a data-form="deleteForm" href="#" class="list-group-item logout">
                                <button type="submit" class="btn btn-block" style="text-align: left"><i
                                        class="demo-pli-unlock icon-lg icon-fw"></i>
                                    Logout</button>
                            </a>
                        </div>
                    </div>


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Website</li>

                        <!--Menu list item-->
                        <li class="active-sub">
                            <a href="{{ route('dashboard') }}">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                                <i class="arrow"></i>
                            </a>
                        </li>

                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">Quản lý</li>

                        <!--Menu list item-->

                        <li>
                            <a href="#">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">Quản trị viên</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                @can('permission-list')
                                    <li><a href="{{ route('permissions.index') }}">Danh sách quyền</a></li>
                                @endcan
                                @can('role-list')
                                    <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
                                @endcan
                            </ul>

                        </li>


                        <!--Menu list item-->
                        @can('admin-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-pen-5"></i>
                                    <span class="menu-title">Người dùng</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('account_admins.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('account_admins.create') }}">Thêm mới</a></li>
                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('schedule-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-receipt-4"></i>
                                    <span class="menu-title">Đặt lịch</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('schedules.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('schedules.create') }}">Thêm mới</a></li>

                                </ul>
                            </li>
                        @endcan

                        @can('patient-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-warning-window"></i>
                                    <span class="menu-title">Bệnh án</span>
                                    <i class="arrow"></i>
                                </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('patient.index')}}">Danh sách</a></li>
                                {{-- <li><a href="{{route('patient.create')}}">Thêm mới</a></li> --}}
                            </ul>
                        </li>
                        @endcan

                        @can('order-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-warning-window"></i>
                                    <span class="menu-title">Hóa đơn</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('order.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('order.add') }}">Thêm mới</a></li>
                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('equipment-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-computer-secure"></i>
                                    <span class="menu-title">Trang thiết bị</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('equipment.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('equipment.add') }}">Thêm mới</a></li>
                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('level-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-computer-secure"></i>
                                    <span class="menu-title">Chức vụ</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('level.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('level.add') }}">Thêm mới</a></li>
                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('specialist-list')
                            <li
                                class="{{ request()->is('admin/specialist') || request()->is('admin/specialist/add') ? 'active' : '' }}">
                                <a href="#">
                                    <i class="demo-pli-bar-chart"></i>
                                    <span class="menu-title">Chuyên khoa</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('specialist.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('specialist.add') }}">Thêm mới</a></li>
                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('room-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-repair"></i>
                                    <span class="menu-title">Phòng ban</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('rooms.index') }}">Danh sách</a></li>
                                    <li><a href="{{ route('rooms.create') }}">Thêm mới</a></li>


                                </ul>
                            </li>
                        @endcan

                        <!--Menu list item-->
                        @can('service-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-warning-window"></i>
                                    <span class="menu-title">Dịch vụ</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('service.index') }}">Danh sách dịch vụ</a></li>
                                    <li><a href="{{ route('service.create') }}">Thêm dịch vụ</a></li>
                                </ul>
                            </li>
                        @endcan


                        @can('product-list')
                            <li>
                                <a href="#">
                                    <i class="demo-pli-warning-window"></i>
                                    <span class="menu-title">Sản phẩm</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                                    <li><a href="{{ route('product-type.index') }}">Loại sản phẩm</a></li>
                                </ul>
                            </li>
                        @endcan

                        {{-- news --}}
                        @can('newCategory-list')
                        <li>
                            <a href="#">
                                <i class="demo-pli-warning-window"></i>
                                <span class="menu-title">Tin tức</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                @can('newCategory-list')
                                <li><a href="{{ route('newCategories.index') }}">Danh mục tin</a></li>
                                @endcan
                                @can('news-list')
                                <li><a href="{{ route('news.index') }}">Bài viết</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan

                        {{-- feedback --}}
                        @can('feedBack-list')
                        <li>
                            <a href="#">
                                <i class="demo-pli-warning-window"></i>
                                <span class="menu-title">Đánh giá</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('feedback.index') }}">Danh sách</a></li>
                                <li><a href="{{ route('feedback.index') }}">Thêm mới</a></li>
                            </ul>
                        </li>
                        @endcan


                        <!--Menu list item-->
                        @can('webSetting-edit')
                        <li>
                            <a href="#">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">Cài đặt chung</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('webSetting.edit') }}">Setting</a></li>
                                <li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
                            </ul>
                        </li>
                        @endcan

                        <!--Widget-->
                        <!--================================-->
                        <div class="mainnav-widget">

                            <!-- Show the button on collapsed navigation -->
                            <div class="show-small">
                                <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                    <i class="demo-pli-monitor-2"></i>
                                    Phản hồi
                                </a>
                            </div>

                            <!-- Hide the content on collapsed navigation -->
                            {{-- <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                <ul class="list-group">
                                    <li class="list-header pad-no mar-ver">Server Status</li>
                                    <li class="mar-btm">
                                        <span class="label label-primary pull-right">15%</span>
                                        <p>CPU Usage</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                <span class="sr-only">15%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <span class="label label-purple pull-right">75%</span>
                                        <p>Bandwidth</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                <span class="sr-only">75%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View
                                            Details</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!--================================-->
                        <!--End widget-->

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
