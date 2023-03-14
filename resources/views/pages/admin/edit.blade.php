@extends('layout.master')
@section('page-title', 'Người dùng')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập nhật admin</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('account_admins.update', $admin->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Email</b></label>
                            <input type="text" class="form-control" readonly name="email" value="{{$admin->email}}" autocomplete="email" autofocus placeholder="Email...">
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
                            <input type="text" class="form-control" value="{{$admin->fullname}}" name="fullname" autocomplete="fullname" autofocus placeholder="Fullname...">
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
                            <input type="text" class="form-control" id="datepickerFuture" name="birthday" value="{{$admin->birthday}}" autocomplete="birthday" autofocus placeholder="Birthday...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>SĐT</b></label>
                            <input type="text" class="form-control" name="phone" value="{{$admin->phone}}" autocomplete="phone" autofocus placeholder="Phone...">
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
                            <input type="text" class="form-control" name="address" value="{{$admin->address}}" autocomplete="address" autofocus placeholder="Address...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ Facebook</b></label>
                            <input type="text" class="form-control" name="facebook_url" value="{{$admin->facebook_url}}" autocomplete="facebook_url" autofocus placeholder="Facebook_url...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Địa chỉ Twitter</b></label>
                            <input type="text" class="form-control" name="twitter_url" value="{{$admin->twitter_url}}" autocomplete="twitter_url" autofocus placeholder="Twitter_url...">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" readonly name="password" value="{{$admin->password}}" autocomplete="password" autofocus placeholder="Password...">
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
                                @if ($admin->room_id)
                                <option {{$admin->room_id == $room->id ? 'selected':'' }} value="{{$room->id}}">{{$room->room_name}}</option>
                                @else
                                <option value="{{$room->id}}">{{$room->room_name}}</option>
                                @endif
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
                                @if ($admin->level_id)
                                <option {{$admin->level_id == $level->id ? 'selected':'' }} value="{{$level->id}}">{{$level->name}}</option>
                                @else
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endif
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
                                @if ($admin->specialist_id)
                                <option {{$admin->specialist_id == $specialist->id ? 'selected':'' }} value="{{$specialist->id}}">{{$specialist->specialist_name}}</option>
                                @else
                                <option value="{{$specialist->id}}">{{$specialist->specialist_name}}</option>
                                @endif
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
                                @if($admin_role)
                                <option {{$admin_role->role_id == $role->id ? 'selected':'' }} value="{{$role->id}}">{{$role->role_name}}</option>
                                @else
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endif
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
                            <input type="file" class="form-control" name="avatar" onchange="preview()"  autocomplete="avatar" autofocus>
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
                            <label for="" class="form-label"><b>Ảnh cũ</b></label>
                            <img src="{{asset($admin->avatar)}}" width="80px" alt="">
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Trạng thái</b></label>
                            <input type="radio" id="is_active" {{$admin->is_active ? 'checked':'' }} @checked(true) name="is_active" value="1" > Kích hoạt
                            <input type="radio" id="is_active1" {{$admin->is_active == 0 ? 'checked':'' }} name="is_active" value="0" > Không kích hoạt
                            @error('is_active')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Mô tả</b></label>
                            <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="description">{{$admin->description?$admin->description:old('description')}}</textarea>
                        </div>

                    </div>

                    <button class="btn btn-primary">Lưu thay đổi</button>
                    <button class="btn btn-danger" type="reset">Nhập lại</button>
                    <a href="{{ route('account_admins.index') }}" class="btn btn-info">Quay lại</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

