@extends('layout.master')
@section('page-title', 'Tạo mới tin tức')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Tạo mới tin tức</h3>
            <a href="{{route('news.index')}}" class="ml-3" style="margin-left: 20px"><- Quay về trang danh sách</a>
        </div>

        @if (session('exception'))
            <div class="alert alert-danger">{{session('exception')}}</div>
        @endif
        @if (session('msg-suc'))
            <div class="alert alert-success">{{session('msg-suc')}} <a href="{{route('news.index')}}">Danh sách</a></div>
        @endif
        <form action="{{ route('news.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-name">Tiêu đề bài viết</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Tiêu đề bài viết" id="demo-hor-name" name="title"
                            class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-function">Nội dung bài viết</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="ckeditor form-control" style="resize: none" rows="10" name="content">{{old('content')}}</textarea>
                        {{-- <textarea placeholder="Chức năng của chuyên khoa" id="demo-hor-function" class="form-control" name="content">{{ old('content') }}</textarea> --}}
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Các hình ảnh</label>
                    <div class="col-md-9">
                        <input type="file"   name="image[]" onchange="handleFileSelect()" multiple>
                        <output id="result" style="display: flex"/>
                        @error('image.*')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Tác giả</label>
                    <div class="col-md-9">
                        <select class="js-example-basic-multiple form-control"
                        name="author_id">
                        <option value="">Chọn tác giả</option>
                        @foreach ($listAuthor as $author)
                        <option value="{{ $author->id }}" {{ (collect(old('author_id'))->contains($author->id)) ? 'selected':'' }}>{{ $author->fullname }}</option>
                        @endforeach
                    </select>
                    </div>
                </div> --}}

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Danh mục bài viết</label>
                    <div class="col-md-9">
                        <select class="js-example-basic-multiple form-control"
                        name="news_category">
                        <option value="">Chọn danh mục bài viết</option>
                        @foreach ($listNewCategory as $category)
                        <option value="{{ $category->id }}" {{ (collect(old('news_category'))->contains($category->id)) ? 'selected':'' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Gắn thẻ</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="tags-inp" name="tags[]" placeholder="Type to add a tag" value="" data-role="tagsinput">
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn btn-black" type="reset">Reset</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
@endsection
