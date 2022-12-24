@extends('layout.master')
@section('page-title', 'Thêm sản phẩm')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{ route('product.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{ session('exception') }}</div>
        @endif
        <form action="{{ route('product.update',$product->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="panel-body">
                <div class="form-group">

                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên(*)</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Giá" id="name" name="name" class="form-control"
                            value="{{ $product->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên loại(*)</label>
                    <div class="col-sm-9">
                        <select name="type_id" id="type_id" class="form-control">
                            @foreach ($types as $type)
                                <option {{ $product->type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Giá(*)</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Giá" id="price" name="price" class="form-control"
                            value="{{ $product->price }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Ảnh</label>
                    <div class="col-sm-9">
                        @if ($product->image)
                            <label for="">Ảnh cũ</label>
                            <img src="{{ asset($product->image) }}" width="150px" alt="">
                            <br>
                        @endif
                        <label for="">Ảnh mới</label>
                        <input type="file" class="form-control" name="image"
                            onchange="preview()" autocomplete="image" autofocus>
                        <img src="" id="previewImage" width="120px" alt="">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Ngày sản xuất</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="nsx" value="{{$product->nsx ? $product->nsx : old('nsx')}}" autocomplete="nsx" autofocus>
                        @error('nsx')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Hạn sử dụng</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="hsd" value="{{$product->hsd?$product->hsd:old('hsd')}}" autocomplete="hsd" autofocus>
                        @error('hsd')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Mô tả</label>
                    <div class="col-sm-9">
                        <textarea name="description" class="form-control" id="description" cols="30" rows="3">{{ $product->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                <button class="btn btn-black" type="reset">Nhập lại</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
@endsection
