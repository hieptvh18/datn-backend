@extends('layout.master') @section('page-title', 'view proflie')
@section('page-content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
        <div class="boxed">
            <!--Fixedbar-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="page-fixedbar-container">
                <div class="page-fixedbar-content">
                    <div class="nano">
                        <div class="nano-content">
                            <p class="pad-all text-main text-sm text-uppercase text-bold">
                                Users
                            </p>

                            <!--Family-->
                            <div class="list-group bg-trans bord-btm">
                                <div class="list-group-item list-item-sm">
                                    <div class="media-left pos-rel">
                                        <a href="#"><img class="img-circle img-xs" src="img/profile-photos/2.png"
                                                alt="Profile Picture" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="text-main">
                                            <p>Stephen Tran</p>
                                        </a>
                                        <button class="btn btn-xs btn-default">
                                            <i class="demo-pli-add-user"></i> Follow
                                        </button>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="media-left pos-rel">
                                        <a href="#"><img class="img-circle img-xs" src="img/profile-photos/8.png"
                                                alt="Profile Picture" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="text-main">
                                            <p>Brittany Meyer</p>
                                        </a>
                                        <button class="btn btn-xs btn-default">
                                            <i class="demo-pli-add-user"></i> Follow
                                        </button>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="media-left pos-rel">
                                        <a href="#"><img class="img-circle img-xs" src="img/profile-photos/4.png"
                                                alt="Profile Picture" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="text-main">
                                            <p>Donald Brown</p>
                                        </a>
                                        <button class="btn btn-xs btn-default">
                                            <i class="demo-pli-add-user"></i> Follow
                                        </button>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="media-left pos-rel">
                                        <a href="#"><img class="img-circle img-xs" src="img/profile-photos/9.png"
                                                alt="Profile Picture" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="text-main">
                                            <p>Betty Murphy</p>
                                        </a>
                                        <button class="btn btn-xs btn-default">
                                            <i class="demo-pli-add-user"></i> Follow
                                        </button>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="media-left pos-rel">
                                        <a href="#"><img class="img-circle img-xs" src="img/profile-photos/7.png"
                                                alt="Profile Picture" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="text-main">
                                            <p>Samantha Reid</p>
                                        </a>
                                        <button class="btn btn-xs btn-default">
                                            <i class="demo-pli-add-user"></i> Follow
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Fixedbar-->

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <div class="panel">
                    <div class="panel-body">
                        <div class="fixed-fluid">
                            <div class="fixed-md-200 pull-sm-left fixed-right-border">
                                <!-- Simple profile -->
                                <div class="text-center">
                                    <div class="pad-ver">
                                        <img src="{{ asset($profile->avatar) }}" class="img-lg img-circle"
                                            alt="Profile Picture" />
                                    </div>
                                    <h4 class="text-lg text-overflow mar-no">{{ $profile->fullname }}</h4>
                                    <p class="text-sm text-muted">{{ $profile->email }}</p>

                                    <div class="pad-ver btn-groups">
                                        <a href="{{ $profile->facebook_url }}"
                                            class="btn btn-icon demo-pli-facebook icon-lg add-tooltip"
                                            data-original-title="Facebook" data-container="body"></a>
                                        <a href="{{ $profile->twitter_url }}"
                                            class="btn btn-icon demo-pli-twitter icon-lg add-tooltip"
                                            data-original-title="Twitter" data-container="body"></a>
                                        <a href="{{ $profile->email_url }}"
                                            class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip"
                                            data-original-title="Google+" data-container="body"></a>
                                        <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip"
                                            data-original-title="Instagram" data-container="body"></a>
                                    </div>
                                    <button class="btn btn-block btn-success btn-lg">Follow</button>
                                </div>
                                <hr />

                                <!-- Profile Details -->
                                <p class="pad-ver text-main text-sm text-uppercase text-bold">
                                    About Me
                                </p>
                                <p>
                                    <i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{ $profile->address }}
                                </p>
                                <p>
                                    <i class="demo-pli-old-telephone icon-lg icon-fw"></i>{{ $profile->phone }}
                                </p>
                            </div>
                            <div class="fluid">
                                <div class="text-right">
                                    <button class="btn btn-sm btn-primary">Send Message</button>
                                </div>
                                <hr class="new-section-md bord-no" />

                                <!--Default Tabs (Right Aligned)-->
                                <!--===================================================-->
                                <div class="tab-base">
                                    <!--Nav tabs-->
                                    <ul class="nav nav-tabs tabs-right">
                                        <li class="active">
                                            <a data-toggle="tab" href="#demo-rgt-tab-1">Profile</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#demo-rgt-tab-2">Setting</a>
                                        </li>
                                    </ul>

                                    <!--Tabs Content-->
                                    <div class="tab-content">
                                        <div id="demo-rgt-tab-1" class="tab-pane fade active in">
                                            <!--Bordered Accordion-->
                                            <!--===================================================-->
                                            <div class="panel-group accordion" id="demo-acc-info-outline">
                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-1">full name</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse in" id="demo-acd-info-outline-1">
                                                        <div class="panel-body">
                                                            {{ $profile->fullname }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-2">Email</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-2">
                                                        <div class="panel-body">
                                                            {{ $profile->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-3">Số điện thoại</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-3">
                                                        <div class="panel-body">
                                                            {{ $profile->phone }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-4">Ngày sinh</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-4">
                                                        <div class="panel-body">
                                                            {{ $profile->birthday }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-5">Địa chỉ</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-5">
                                                        <div class="panel-body">
                                                            {{ $profile->address }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-6">Địa chỉ Facebook</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-6">
                                                        <div class="panel-body">
                                                            {{ $profile->facebook_url }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-7">Địa chỉ Twitter</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-7">
                                                        <div class="panel-body">
                                                            {{ $profile->twitter_url }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-bordered panel-info">
                                                    <!--Accordion title-->
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                                                href="#demo-acd-info-outline-8">Địa chỉ Email</a>
                                                        </h4>
                                                    </div>

                                                    <!--Accordion content-->
                                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-8">
                                                        <div class="panel-body">
                                                            {{ $profile->email_url }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--===================================================-->
                                            <!--End Bordered Accordion-->
                                        </div>
                                        <div id="demo-rgt-tab-2" class="tab-pane fade">
                                            <p class="bord-btm pad-ver text-main text-bold">
                                                Cập nhật
                                            </p>

                                            <form action="{{ route('profile.update', $profile->id) }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Email</b></label>
                                                            <input type="text" class="form-control" readonly
                                                                name="email" value="{{ $profile->email }}"
                                                                autocomplete="email" autofocus placeholder="Email...">
                                                        </div>
                                                    </div>
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Họ và
                                                                    tên</b></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $profile->fullname }}" name="fullname"
                                                                autocomplete="fullname" autofocus
                                                                placeholder="Fullname...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Ngày
                                                                    sinh</b></label>
                                                            <input type="date" class="form-control" name="birthday"
                                                                value="{{ $profile->birthday }}" autocomplete="birthday"
                                                                autofocus placeholder="Birthday...">
                                                        </div>
                                                    </div>
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>SĐT</b></label>
                                                            <input type="text" class="form-control" readonly
                                                                name="phone" value="{{ $profile->phone }}"
                                                                autocomplete="phone" autofocus placeholder="Phone...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Địa
                                                                    chỉ</b></label>
                                                            <input type="text" class="form-control" name="address"
                                                                value="{{ $profile->address }}" autocomplete="address"
                                                                autofocus placeholder="Address...">
                                                        </div>
                                                    </div>
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Địa chỉ
                                                                    Facebook</b></label>
                                                            <input type="text" class="form-control"
                                                                name="facebook_url" value="{{ $profile->facebook_url }}"
                                                                autocomplete="facebook_url" autofocus
                                                                placeholder="Facebook_url...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Địa chỉ
                                                                    Twitter</b></label>
                                                            <input type="text" class="form-control" name="twitter_url"
                                                                value="{{ $profile->twitter_url }}"
                                                                autocomplete="twitter_url" autofocus
                                                                placeholder="Twitter_url...">
                                                        </div>
                                                    </div>
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Địa chỉ
                                                                    Email</b></label>
                                                            <input type="text" class="form-control" name="email_url"
                                                                value="{{ $profile->email_url }}"
                                                                autocomplete="email_url" autofocus
                                                                placeholder="Email_url...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Ảnh</b></label>
                                                            <input type="file" class="form-control" name="avatar"
                                                                onchange="preview()" autocomplete="avatar" autofocus>
                                                            <img src="" id="previewImage" width="120px"
                                                                alt="">
                                                        </div>
                                                        @error('avatar')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="panel-body col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"><b>Ảnh cũ</b></label>
                                                            <img src="{{ asset($profile->avatar) }}" width="120px"
                                                                alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row text-right" style="padding: 0 25px 15px 0 ">
                                                    <button class="btn btn-primary">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Default Tabs (Right Aligned)-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->
        </div>
        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection
