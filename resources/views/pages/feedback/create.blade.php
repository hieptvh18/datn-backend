@extends('layout.master')
@section('page-title', 'Thêm đánh giá')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm đánh giá</h3>
            <a href="{{ route('feedback.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>


        <form action="{{ route('feedback.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Họ và tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Họ và tên" value="{{old('customer_name')}}" name="customer_name">
                        @error('customer_name')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Email" value="{{old('customer_email')}}" name="customer_email">
                        @error('customer_email')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ảnh: </label>
                    <div class="col-sm-9">
                        <input type="file" name="customer_avatar">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-3 control-label">Nội dung</label>
                    <div class="col-md-9">
                        <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="content">{{old('content')}}</textarea>
                            @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Kích hoạt</label>
                    <div class="col-sm-9">
                        <input type="checkbox" style="margin-top: 10px" checked name="is_active" class="">
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
