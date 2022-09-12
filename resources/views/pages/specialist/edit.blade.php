@extends('layout.master')
@section('page-title', 'Chỉnh sửa chuyên khoa')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{ session('exception') }}</div>
        @endif
        @if (session('msg-suc'))
            <div class="alert alert-success">{{ session('msg-suc') }} <a href="{{ route('specialist.index') }}">Danh sách</a>
            </div>
        @endif
        @if (session('msg-err'))
            <div class="alert alert-danger">{{ session('msg-err') }} <a href="{{ route('specialist.index') }}">Danh sách</a>
            </div>
        @endif
        <form action="{{ route('specialist.update', $specialist->id) }}" class="form-horizontal" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên chuyên khoa" id="demo-hor-name" name="specialist_name"
                            class="form-control" value="{{ $specialist->specialist_name }}">
                        @error('specialist_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Chức năng</label>
                    <div class="col-sm-9">
                        <textarea placeholder="Chức năng của chuyên khoa" id="demo-hor-function" class="form-control" name="function">{{ $specialist->function }}</textarea>
                        @error('function')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-md-9">
                        <div class="show-img" style="display: flex">
                            @if ($specialist->galleries)
                            <p class="col-md-4 control-label">Các hình ảnh</p>
                                @foreach ($specialist->galleries as $image)
                                    <div class="show-img_item mr-2">
                                        <img src="{{asset($image->path)}}" width="100px" alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <br>
                        <label class="col-md-4 control-label">Tải lên hình ảnh</label>
                        <input type="file" name="image[]" id="" class="" multiple>
                        @error('image.*')
                            <div class="text-danger">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $specialist->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input id="demo-remember-me-2" {{ $specialist->is_active ? 'checked' : '' }} class="magic-checkbox"
                            name="is_active" type="checkbox" value="1">
                        <label for="demo-remember-me-2">Active</label>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn btn-black" type="reset">Reset</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
@endsection
