@extends('layout.master')
@section('page-title', 'Phòng ban')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập nhật phòng ban</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('schedules.update', $schedules->id) }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Fullname</b></label>
                            <input type="text" class="form-control" name="fullname" value="{{$schedules->fullname}}">
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
                            <input type="date" class="form-control" name="birthday" value="{{$schedules->birthday}}">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Gender</b></label>
                            <select name="gender" class="form-control" id="">
                                <option value="nam">Nam</option>
                                <option value="nữ">Nữ</option>
                            </select>
                        </div>
                        @error('gender')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Address</b></label>
                            <textarea type="text" class="form-control" style="resize: none" rows="5" name="address" >{{$schedules->address}}</textarea>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Phone</b></label>
                            <input type="text" class="form-control" name="phone" value="{{$schedules->phone}}">
                        </div>
                        @error('phone')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Email</b></label>
                            <input type="text" class="form-control" name="email" value="{{$schedules->email}}">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>CMND</b></label>
                            <input type="text" class="form-control" name="cmnd" value="{{$schedules->cmnd}}">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Content</b></label>
                            <textarea type="text" class="form-control" style="resize: none" rows="10" name="content">{{$schedules->content}}</textarea>
                        </div>
                        @error('content')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Date</b></label>
                            <input type="date" class="form-control" name="date" value="{{$schedules->date}}"/>
                        </div>
                        @error('date')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

