@extends('layout.master')
@section('page-title', 'Chỉnh sửa trang thiết bị')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{route('equipment.index')}}" class="ml-3" style="margin-left: 20px"><- Quay về trang danh sách</a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{ session('excep') }}</div>
        @endif
        <form action="{{ route('equipment.update', $equipment->id) }}" role="form" class="form-horizontal" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên thiết bị</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên chuyên khoa" id="demo-hor-name" name="name"
                            class="form-control" value="{{ $equipment->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Giá</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Mức giá" id="price" name="price"
                            class="form-control" value="{{ $equipment->price }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="show-img" style="display: flex">
                            @if (isset($equipment) && $equipment->image)
                            <p class="col-md-4 control-label">Hình ảnh</p>
                                <div class="show-img_item mr-2">
                                    <img src="{{asset($equipment->image)}}" width="100px" alt="">
                                </div>
                            @endif
                        </div>
                        <br>
                        <label class="col-md-4 control-label">Tải lên hình ảnh</label>
                        <input type="file" name="image" src="{{asset($equipment->image)}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Kích thước</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="kích thước" id="size" name="size"
                            class="form-control" value="{{ $equipment->size }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control">{{ $equipment->short_desc }}</textarea>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-black" type="reset">Reset</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
@endsection
