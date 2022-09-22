@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h1>Thêm dịch vụ</h1>
        </div>
        <div class="panel-body">

            <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="control-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" name="service_name">
                    @error('service_name')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Giá</label>
                    <input type="text" class="form-control" name="price">
                    @error('price')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Kích hoạt
                        <input type="checkbox" name="active" class=""></label>
                </div>
                 <div class="form-group">
                    <label for="" class="control-label">Thuộc dịch vụ:
                        <select class="form-select" name="parent_id" aria-label="Default select example">
                            <option value="">Không thuộc dịch vụ cha</option>
                            @foreach($parentServices as $service)
                            <option value="{{$service->id}}">{{$service->service_name}}</option>
                            @endforeach
                        </select>

                </div>
                <div class="form-group">
                    <label for="" class="control-label">Ảnh dịch vụ:
                        <input type="file" name="image">
                </div>
                <button type="submit">Lưu</button>
            </form>
        </div>
    </div>
@endsection
