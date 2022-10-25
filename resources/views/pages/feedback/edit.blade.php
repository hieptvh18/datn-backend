@extends('layout.master')
@section('page-title', 'Cập nhật đánh giá')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Cập nhật đánh giá</h3>
            <a href="{{ route('feedback.index') }}" class="ml-3" style="margin-left: 20px">
                <- Quay về </a>
        </div>


        <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Họ và tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Họ và tên" value="{{$feedback->customer_name?$feedback->customer_name:old('customer_name')}}" name="customer_name">
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
                        <input type="text" class="form-control" placeholder="Email" value="{{$feedback->customer_email?$feedback->customer_email:old('customer_email')}}" name="customer_email">
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
                    <label for="" class="col-sm-3 control-label">Ảnh cũ: </label>
                    <div class="col-sm-9">
                      <img src="{{asset($feedback->customer_avatar)}}" width="120px" alt="">
                    </div>

                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-3 control-label">Nội dung</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" style="resize: none" rows="10" name="content">{{$feedback->content?$feedback->content:old('content')}}</textarea>
                            @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Kích hoạt</label>
                    <div class="col-sm-9">
                        <input type="checkbox" style="margin-top: 10px" {{$feedback->is_active?'checked':''}} name="is_active" class="">
                    </div>
                </div>
            </div>

                <div class="panel-footer text-right">
                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                </div>
        </form>
    </div>

@endsection
