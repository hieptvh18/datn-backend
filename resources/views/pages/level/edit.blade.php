@extends('layout.master')
@section('page-title', 'Chỉnh sửa chức vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
            <a href="{{ route('level.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về trang danh sách</a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{ session('excep') }}</div>
        @endif
        <form action="{{ route('level.update', $level->id) }}" role="form" class="form-horizontal" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Chức vụ</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên chức vụ" id="demo-hor-name" name="name"
                            class="form-control" value="{{ $level->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">

                        <textarea name="description" id="description" cols="30" rows="5" class="ckeditor form-control">{{ $level->description }}</textarea>
                        
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-black" type="reset">Reset</button>
            </div>
        </form>

    </div>
@endsection
@section('page-js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

