@extends('layout.master')
@section('page-title', 'Thêm dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h1>Thêm dịch vụ</h1>
        </div>
        <div class="panel-body">

            <form action="{{route('service.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="control-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" name="service_name">
                    @error('service_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Giá</label>
                    <input type="number" class="form-control" name="price">
                    @error('price')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Kích hoạt
                        <input type="checkbox" name="active" class=""></label>
                </div>
                <button type="submit">Lưu</button>
            </form>
        </div>
    </div>
@endsection
