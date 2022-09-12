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
                <form action="{{ route('account_admins.store') }}" method="post">
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
                            <label for="" class="form-label"><b>Fullname</b></label>
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
                            <label for="" class="form-label"><b>Birthday</b></label>
                            <input type="date" class="form-control" name="birthday" value="{{old('birthday')}}" autocomplete="birthday" autofocus placeholder="Birthday...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Phone</b></label>
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
                            <label for="" class="form-label"><b>Address</b></label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" autocomplete="address" autofocus placeholder="Address...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Facebook_url</b></label>
                            <input type="text" class="form-control" name="facebook_url" value="{{old('facebook_url')}}" autocomplete="facebook_url" autofocus placeholder="Facebook_url...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Twitter_url</b></label>
                            <input type="text" class="form-control" name="twitter_url" value="{{old('twitter_url')}}" autocomplete="twitter_url" autofocus placeholder="Twitter_url...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Email_url</b></label>
                            <input type="text" class="form-control" name="email_url" value="{{old('email_url')}}"  autocomplete="email_url" autofocus placeholder="Email_url...">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Password</b></label>
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
                            <label for="" class="form-label"><b>Room</b></label>
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
                            <label for="" class="form-label"><b>Level</b></label>
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
                            <label for="" class="form-label"><b>Specialist</b></label>
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
                            <label for="" class="form-label"><b>Role</b></label>
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
                            <label for="" class="form-label"><b>Is_active</b></label>
                            <input type="radio" id="is_active" name="is_active" value="1" > Active
                            <input type="radio" id="is_active1" name="is_active" value="0" > In_Active
                            @error('is_active')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>




                    <button class="btn btn-primary">Save</button>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

