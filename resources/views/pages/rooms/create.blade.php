@extends('layout.master')
@section('page-title', 'Tạo mới phòng ban')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tạo mới phòng ban</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('rooms.store') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Tên phòng ban</b></label>
                            <input type="text" placeholder="Tên phòng ban..."
                                class="form-control @error('room_name') is-invalid @enderror" name="room_name"
                                value="{{ old('room_name') }}" autocomplete="room_name" autofocus>
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
                            <textarea type="text" class="form-control @error('history') is-invalid @enderror" name="history"
                                placeholder="Lịch sử..." autocomplete="history" autofocus rows="5" style="resize: none"></textarea>
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
                            <textarea type="text" class="form-control @error('mission') is-invalid @enderror" name="mission"
                                placeholder="Nhiệm vụ..." autocomplete="mission" autofocus rows="5" style="resize: none"></textarea>
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
                            <textarea type="text" class="form-control @error('achievement') is-invalid @enderror"
                                name="achievement" placeholder="Thành tựu..." autocomplete="achievement" autofocus rows="5" style="resize: none"></textarea>
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
