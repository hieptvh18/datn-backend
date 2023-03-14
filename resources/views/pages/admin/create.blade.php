@extends('layout.master')
@section('page-title', 'Người dùng')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tạo mới người dùng</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('account_admins.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Email</b></label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" autocomplete="email" autofocus placeholder="Email...">
                        </div>
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Họ và tên</b></label>
                            <input type="text" class="form-control" value="{{old('fullname')}}" name="fullname" autocomplete="fullname" autofocus placeholder="Fullname...">
                        </div>
                        @error('fullname')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Ngày sinh</b></label>
                            <input type="text" id="datepickerFuture" class="form-control" name="birthday" value="{{old('birthday')}}" autocomplete="birthday" autofocus placeholder="Birthday...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>SĐT</b></label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" autocomplete="phone" autofocus placeholder="Phone...">
                        </div>
                        @error('phone')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ</b></label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" autocomplete="address" autofocus placeholder="Address...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ facebook</b></label>
                            <input type="text" class="form-control" name="facebook_url" value="{{old('facebook_url')}}" autocomplete="facebook_url" autofocus placeholder="Facebook_url...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ twitter</b></label>
                            <input type="text" class="form-control" name="twitter_url" value="{{old('twitter_url')}}" autocomplete="twitter_url" autofocus placeholder="Twitter_url...">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" name="password" value="{{old('password')}}" autocomplete="password" autofocus placeholder="Password...">
                        </div>
                        @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Phòng ban</b></label>
                            <select name="room_id" id="" class="form-control">
                                <option value="">Chọn phòng ban</option>
                                @foreach ($list_room as $room)
                                <option value="{{$room->id}}">{{$room->room_name}}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Chức vụ</b></label>
                            <select name="level_id" id="" class="form-control">
                                <option value="">Chọn chức vụ</option>
                                @foreach ($list_level as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Chuyên khoa</b></label>
                            <select name="specialist_id" id="" class="form-control">
                                <option value="">Chọn chuyên khoa</option>
                                @foreach ($list_specialist as $specialist)
                                <option value="{{$specialist->id}}">{{$specialist->specialist_name}}</option>
                                @endforeach
                            </select>
                            @error('specialist_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Vai trò</b></label>
                            <select name="role_id" id="" class="form-control">
                                <option value="">Chọn vai trò</option>
                                @foreach ($list_role as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Ảnh</b></label>
                            <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}" onchange="preview()"  autocomplete="avatar" autofocus>
                            <img src="" id="previewImage" width="120px" alt="">
                        </div>
                        @error('avatar')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Trạng thái</b></label>
                            <input type="radio" id="is_active" @checked(true) name="is_active" value="1" > Kích hoạt
                            <input type="radio" id="is_active1" name="is_active" value="0" > Không kích hoạt
                            @error('is_active')
                            <br>
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Mô tả</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="description">{{old('description')}}</textarea>
                        </div>

                    </div>



                    <button class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-danger" type="reset">Nhập lại</button>
                    <a href="{{ route('account_admins.index') }}" class="btn btn-info">Quay lại</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

