
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
                                <img class="img-circle img-md" src="img/profile-photos/1.png"
                                    alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse"
                                aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name">Aaron Chavez</p>
                                <span class="mnp-desc">aaron.cha@themeon.net</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
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
                            <a href="{{route('dashboard')}}">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                                <i class="arrow"></i>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Layouts</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="layouts-collapsed-navigation.html">Collapsed Navigation</a>
                                </li>
                                <li><a href="layouts-offcanvas-navigation.html">Off-Canvas Navigation</a>
                                </li>
                                <li><a href="layouts-offcanvas-slide-in-navigation.html">Slide-in
                                        Navigation</a></li>
                                <li><a href="layouts-offcanvas-revealing-navigation.html">Revealing
                                        Navigation</a></li>
                                <li class="list-divider"></li>
                                <li><a href="layouts-aside-right-side.html">Aside on the right side</a></li>
                                <li><a href="layouts-aside-left-side.html">Aside on the left side</a></li>
                                <li><a href="layouts-aside-dark-theme.html">Dark version of aside</a></li>
                                <li class="list-divider"></li>
                                <li><a href="layouts-fixed-navbar.html">Fixed Navbar</a></li>
                                <li><a href="layouts-fixed-footer.html">Fixed Footer</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="widgets.html">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">
                                    Widgets
                                    <span class="pull-right badge badge-warning">24</span>
                                </span>
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
                                <li><a href="{{ route('permissions.index') }}">Danh sách permission</a></li>
                                @endcan
                                @can('role-list')
                                <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
                                @endcan
                                <li><a href="ui-modals.html">Phân quyền</a></li>
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
                                <li><a href="forms-components.html">Thêm mới</a></li>
                            </ul>
                        </li>
                        @endcan

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Đặt lịch</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('schedules.index')}}">Lịch khám</a></li>
                                <li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="tables-datatable.html">Data Tables</a></li>
                                <li><a href="tables-footable.html">Foo Tables</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li class="{{request()->is('admin/specialist') || request()->is('admin/specialist/add') ? 'active' : ''}}">
                            <a href="#">
                                <i class="demo-pli-bar-chart"></i>
                                <span class="menu-title">Chuyên khoa</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('specialist.index')}}">Danh sách</a></li>
                                <li><a href="{{route('specialist.add')}}">Thêm mới</a></li>
                            </ul>
                        </li>

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
                                <li><a href="misc-maps.html">Google Maps</a></li>
                                <li><a href="xplugins-notifications.html">Notifications<span
                                            class="label label-purple pull-right">Improved</span></a></li>
                                <li><a href="misc-nestable-list.html">Nestable List</a></li>

                            </ul>
                        </li>
                        @endcan

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-warning-window"></i>
                                <span class="menu-title">Dịch vụ</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('service.index')}}">Danh sách dịch vụ</a></li>
                                <li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-warning-window"></i>
                                <span class="menu-title">Cài đặt chung</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
                                <li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
                            </ul>
                        </li>

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
                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
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
                        </div>
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
