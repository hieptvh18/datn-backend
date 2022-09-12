@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h1>Thêm dịch vụ</h1>
        </div>
        <div class="panel-body">

            <form action="{{route('service.update',$service->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="" class="control-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" name="service_name" value="{{$service->service_name}}">
                    @error('service_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Giá</label>
                    <input type="number" class="form-control" name="price" value="{{$service->price}}">
                    @error('price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Kích hoạt
                        <input type="checkbox" name="active" class="" {{$service->is_active == 1 ? 'checked' : ''}}></label>
                </div>
                <button type="submit">Lưu</button>
            </form>
        </div>
    </div>
@endsection
