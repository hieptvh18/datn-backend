@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h1>Thêm dịch vụ</h1>
        </div>
        <div class="panel-body">

            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="" class="control-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}">
                    @error('service_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Giá</label>
                    <input type="text" class="form-control" name="price" value="{{ $service->price }}">
                    @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Kích hoạt
                        <input type="checkbox" name="active" class=""
                            {{ $service->is_active == 1 ? 'checked' : '' }}></label>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Thuộc dịch vụ:
                        <select class="form-select" name="parent_id" aria-label="Default select example">
                            @foreach ($parentServices as $parent)
                                <option value="{{ $parent->id }}" {{ $service->parent_id === $parent->id ? 'selected' : '' }}>
                                    {{ $parent->service_name }}</option>
                            @endforeach
                        </select>

                </div>
                <div class="form-group">
                    <label for="" class="control-label">Ảnh dịch vụ:
                        <input type="file" name="image"> <br>
                        <img src="{{ asset($service->image) }}" alt="" width="200">
                </div>
                <button type="submit">Lưu</button>
            </form>
        </div>
    </div>
@endsection
