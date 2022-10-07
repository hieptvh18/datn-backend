@extends('layout.master')
@section('page-title', 'Trang thiết bị')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{ route('equipment.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về trang danh sách</a>
        </div>


        <form action="{{ route('equipment.save') }}" role="form" class="form-horizontal" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên thiết bị</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên thiết bị" id="name" name="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Giá</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Mức giá" id="price" name="price" class="form-control"
                            value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hình ảnh</label>
                    <div class="col-md-9">
                        <input type="file" name="image" id="image" multiple>
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Kích thước</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="kích thước" id="size" name="size" class="form-control"
                            value="{{ old('size') }}">
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control">{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
