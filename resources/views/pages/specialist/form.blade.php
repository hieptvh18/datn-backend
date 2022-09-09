@extends('layout.master')
@section('page-title', 'Chuyên khoa')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $pageTitle }}</h3>
        </div>

        <form action="{{route('specialist.save')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tên</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tên chuyên khoa" id="demo-hor-name" name="specialist_name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Chức năng</label>
                    <div class="col-sm-9">
                        <textarea placeholder="Chức năng của chuyên khoa" id="demo-hor-function" class="form-control" name="function"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hình ảnh</label>
                    <div class="col-md-9">
                        <span class="pull-left btn btn-primary btn-file">
                            Upload... <input type="file" name="image[]" multiple>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-md-9">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input id="demo-remember-me-2" class="magic-checkbox" name="is_active" type="checkbox" value="1">
                        <label for="demo-remember-me-2">Active</label>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
@endsection
