@extends('layout.master')
@section('page-title', 'Bài viết')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Quản lý bài viết</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="{{ route('news.create') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Thêm</button>
                                </a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default" id="delete-multiple" data-route="{{ route('specialist.deleteMultiple') }}" ><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('specialist.search') }}" method="get">
                                    <input type="text" autocomplete="off" name="key" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
                                    </form>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i
                                            class="demo-pli-download-from-cloud icon-lg"></i></button>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-default btn-active-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="demo-pli-dot-vertical icon-lg"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#">Delete selected</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if (session('msg-suc'))
                            <div class="alert alert-success">{{ session('msg-suc') }}</div>
                        @endif
                        @if (session('msg-err'))
                            <div class="alert alert-danger">{{ session('msg-err') }}</div>
                        @endif
                        @if (session('exception'))
                        <div class="alert alert-danger">{{ session('exception') }}</div>
                    @endif
                        <table class="table table-striped Card">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="Parent" name="" id="">
                                    </th>
                                    <th>ID</th>
                                    <th>Tiêu đề bài viết</th>
                                    <th>Nội dung bài viết</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listNews as $news)
                                    <tr>
                                        <td><input type="checkbox" class="Childrent" name="news_id[]" value="{{$news->id}}"></td>
                                        <td><a href="#" class="btn-link">#{{ $news->id }}</a></td>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ substr($news->content, 0,50) }}...</td>
                                        <td class="text-center">

                                            <a href="{{ route('news.edit', $news->id) }}" class="label label-table label-success">Sửa</a>


                                            <form id="deleteForm{{ $news->id }}" action="{{ route('news.delete', $news->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button data-form="deleteForm{{$news->id}}" class="label label-table label-danger btn-delete" style="border: none" >Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $listNews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
