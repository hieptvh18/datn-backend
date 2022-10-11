@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Sửa dịch vụ</h3>
            <a href="{{ route('service.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>


            <form action="{{ route('service.update', $service->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tên dịch vụ(*)</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}">
                    @error('service_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Giá</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="price" value="{{ $service->price }}">
                    @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Kích hoạt</label>
                        <div class="col-sm-9">
                        <input type="checkbox" name="active" class=""
                            {{ $service->is_active == 1 ? 'checked' : '' }}>
                        </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Thuộc dịch vụ: </label>
                    <div class="col-sm-9">
                        <select class="form-select" name="parent_id" aria-label="Default select example">
                            <option value="">Không thuộc dịch vụ cha</option>
                            @foreach ($parentServices as $parent)
                                <option value="{{ $parent->id }}" {{ $service->parent_id === $parent->id ? 'selected' : '' }}>
                                    {{ $parent->service_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ảnh dịch vụ: </label>
                    <div class="col-sm-9">
                        <input type="file" name="image"> <br>
                        <img src="{{ asset($service->image) }}" alt="" width="200">
                    </div>
                </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                    <button class="btn btn-black" type="reset">Nhập lại</button>
                </div>
            </div>
            </form>
        </div>

@endsection
