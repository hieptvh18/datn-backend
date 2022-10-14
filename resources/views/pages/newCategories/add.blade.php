@extends('layout.master')
@section('page-title', 'Thêm danh mục tin tức')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm danh mục tin tức</h3>
            <a href="{{ route('newCategories.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>


        <form action="{{ route('newCategories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tên danh mục tin tức</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Tên dịch vụ" value="{{ old('category_name') }}" name="category_name">
                        @error('category_name')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                            placeholder="Mô tả danh mục tin tức">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ảnh danh mục tin tức: </label>
                    <div class="col-sm-9">
                        <input type="file" name="category_image">
                    </div>
                </div>
            </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                    <button class="btn btn-black" type="reset">Nhập lại</button>
                </div>
        </form>
    </div>

@endsection
