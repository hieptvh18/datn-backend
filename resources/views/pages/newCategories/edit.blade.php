@extends('layout.master')
@section('page-title', 'Cập nhật danh mục tin tức')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Cập nhật danh mục tin tức</h3>
            <a href="{{ route('newCategories.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>

        @if (session('exception'))
        <div class="alert alert-danger">{{ session('exception') }}</div>
    @endif
            <form action="{{ route('newCategories.update', $newCategory->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tên danh mục tin tức(*)</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="category_name" value="{{ $newCategory->category_name }}">
                    <input type="hidden" class="form-control" name="id" value="{{ $newCategory->id }}">
                    @error('category_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session('errorExit'))
                    <div class="text-danger">
                        {{ session('errorExit') }}
                    </div>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                            placeholder="Mô tả danh mục tin tức">{{ $newCategory->description?$newCategory->description:old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ảnh danh mục tin tức: </label>
                    <div class="col-sm-9">
                        <input type="file" name="category_image">
                        <img src="{{asset($newCategory->category_image)}}" width="80px" alt="">
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                    <button class="btn btn-black" type="reset">Nhập lại</button>
                </div>
            </div>
            </form>
        </div>

@endsection
