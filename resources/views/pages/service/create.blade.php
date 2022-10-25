@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm dịch vụ</h3>
            <a href="{{ route('service.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>


        <form action="{{ route('service.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tên dịch vụ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Tên dịch vụ" name="service_name">
                        @error('service_name')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Giá</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="price">
                        @error('price')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Kích hoạt</label>
                    <div class="col-sm-9">
                         <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" name="active" checked>
                        <label for="demo-form-inline-checkbox"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Thuộc dịch vụ: </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="parent_id" aria-label="Default select example">
                            <option value="0">Không thuộc dịch vụ cha</option>
                            @foreach ($parentServices as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"><b>Nội dung</b></label>
                        <div class="col-sm-9">
                        <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="description">{{old('description')}}</textarea>
                    </div>
                    </div>
                    @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ảnh dịch vụ: </label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
