@extends('layout.master')

@section('page-title', 'Dashboard')

@section('page-content')
    <div class="row">
        <div class="col-lg-7">

            <!--Network Line Chart-->
            <!--===================================================-->
            <div id="demo-panel-network" class="panel">
                <div class="panel-heading">
                    <div class="panel-control">
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
                    </div>
                    <h3 class="panel-title">Network</h3>
                </div>


                <!--chart placeholder-->
                <div class="pad-all">
                    <div id="demo-chart-network" style="height: 255px"></div>
                </div>


                <!--Chart information-->
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <p class="text-semibold text-uppercase text-main">CPU Temperature</p>
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
                                <p class="text-semibold text-uppercase text-main">Today Tips</p>
                                <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer
                                    adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <p class="text-uppercase text-semibold text-main">Bandwidth Usage</p>
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
            <div class="row">
                <div class="col-sm-6 col-lg-6">

                    <!--Sparkline Area Chart-->
                    <div class="panel panel-success panel-colorful">
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6">

                    <!--Sparkline bar chart -->
                    <div class="panel panel-purple panel-colorful">
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
                    <div class="panel panel-warning panel-colorful">
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
                </div>
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
                        <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
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
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Documents</p>
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
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Zip Files</p>
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
                    <p class="text-2x mar-no text-semibold">241</p>
                    <p class="mar-no">Photos</p>
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

    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <!--List Todo-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="panel panel-trans">
                <div class="panel-heading">
                    <h3 class="panel-title">To do list</h3>
                </div>
                <div class="pad-ver">
                    <ul class="list-group bg-trans list-todo mar-no">
                        <li class="list-group-item">
                            <input id="demo-todolist-1" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-1"><span>Find an idea. <span
                                        class="label label-danger">Important</span></span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-2" class="magic-checkbox" type="checkbox" checked>
                            <label for="demo-todolist-2"><span>Do some work</span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-3" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-3"><span>Read the book</span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-4" class="magic-checkbox" type="checkbox">
                            <label for="demo-todolist-4"><span>Upgrade server <span
                                        class="label label-warning">Warning</span></span></label>
                        </li>
                        <li class="list-group-item">
                            <input id="demo-todolist-5" class="magic-checkbox" type="checkbox" checked>
                            <label for="demo-todolist-5"><span>Redesign my logo <span class="label label-info">2
                                        Mins</span></span></label>
                        </li>
                    </ul>
                </div>
                <div class="input-group pad-all">
                    <input type="text" class="form-control" placeholder="New task" autocomplete="off">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success"><i class="demo-pli-add"></i></button>
                    </span>
                </div>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End todo list-->
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="panel panel-trans">
                <div class="panel-heading">
                    <div class="panel-control">
                        <a title="" data-html="true" data-container="body"
                            data-original-title="&lt;p class='h4 text-semibold'&gt;Information&lt;/p&gt;&lt;p style='width:150px'&gt;This is an information bubble to help the user.&lt;/p&gt;"
                            href="#"
                            class="demo-psi-information icon-lg icon-fw unselectable text-info add-tooltip"></a>
                    </div>
                    <h3 class="panel-title">Services</h3>
                </div>
                <div class="bord-btm">
                    <ul class="list-group bg-trans">
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-online-status-checkbox" class="toggle-switch" type="checkbox" checked>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                            Online status
                        </li>
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-show-off-contact-checkbox" class="toggle-switch" type="checkbox" checked>
                                <label for="demo-show-off-contact-checkbox"></label>
                            </div>
                            Show offline contact
                        </li>
                        <li class="list-group-item">
                            <div class="pull-right">
                                <input id="demo-show-device-checkbox" class="toggle-switch" type="checkbox">
                                <label for="demo-show-device-checkbox"></label>
                            </div>
                            Show my device icon
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="pad-btm">
                        <p class="text-semibold text-main">Upgrade Progress</p>
                        <div class="progress progress-md">
                            <div class="progress-bar progress-bar-purple" aria-valuenow="15" aria-valuemin="0"
                                aria-valuemax="100" style="width: 15%;" role="progressbar">
                                <span class="sr-only">15%</span>
                            </div>
                        </div>
                        <small>15% Completed</small>
                    </div>
                    <div>
                        <p class="text-semibold text-main">Database</p>
                        <div class="progress progress-md">
                            <div class="progress-bar progress-bar-success" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width: 70%;" role="progressbar">
                                <span class="sr-only">70%</span>
                            </div>
                        </div>
                        <small>70% Completed</small>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-sm-12 col-lg-4'>
            <div class="panel panel-trans">
                <div class="pad-all">
                    <div class="media mar-btm">
                        <div class="media-left">
                            <img src="img/profile-photos/2.png" class="img-md img-circle" alt="Avatar">
                        </div>
                        <div class="media-body">
                            <p class="text-lg text-main text-semibold mar-no">Ralph West</p>
                            <p>Project manager</p>
                        </div>
                    </div>
                    <blockquote class="bq-sm bq-open bq-close">Lorem ipsum dolor sit amet, consecte tuer
                        adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
                </div>

                <div class="bord-top">
                    <ul class="list-group bg-trans bord-no">
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-facebook icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">Facebook</a>
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-twitter icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">@RalphWe</a>
                                <br> Design my themes with <a href="#" class="btn-link text-bold">#Bootstrap</a>
                                Lorem ipsum dolor sit
                                amet, consectetuer adipiscing elit.
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-left">
                                <i class="demo-psi-instagram icon-lg"></i>
                            </div>
                            <div class="media-body">
                                <a href="#" class="btn-link text-semibold">Ralphz</a>
                            </div>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <div class="media-body">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
