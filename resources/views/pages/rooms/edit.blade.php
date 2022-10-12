@extends('layout.master')
@section('page-title', 'Cập nhật phòng ban')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập nhật phòng ban</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('rooms.update', $room->id) }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Tên phòng ban</b></label>
                            <input type="text" class="form-control" name="room_name" value="{{$room->room_name}}">
                        </div>
                        @error('room_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Lịch sử</b></label>
                            <textarea type="text" class="form-control" name="history" rows="5" style="resize: none">{{$room->history}}</textarea>
                        </div>
                        @error('history')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Nhiệm vụ</b></label>
                            <textarea type="text" class="form-control" name="mission" rows="5" style="resize: none">{{$room->mission}}</textarea>
                        </div>
                        @error('mission')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Thành tựu</b></label>
                            <textarea type="text" class="form-control" name="achievement" rows="5" style="resize: none">{{$room->achievement}}</textarea>
                        </div>
                        @error('achievement')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <a href="{{ route('rooms.index') }}" class="btn btn-info">Back</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

