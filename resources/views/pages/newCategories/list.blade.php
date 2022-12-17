@extends('layout.master')
@section('page-title', 'Danh mục tin tức')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Danh mục tin tức</h3>
        </div>

        <!--Data Table-->
        <!--===================================================-->
        <div class="panel-body">
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <a href="{{ route('newCategories.create') }}"><button id="demo-btn-addrow" class="btn btn-purple"><i
                                    class="demo-pli-add"></i> Thêm</button></a>
                        <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
                            <button class="btn btn-default" id="multi-delete"
                                data-route="{{ route('service.deleteSelected') }}"><i
                                    class="demo-pli-recycling"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-6 table-toolbar-right">
                        <div class="form-group">
                            <form action="{{ route('service.search') }}" method="get">
                                <input type="text" autocomplete="off" name="key" class="form-control"
                                    placeholder="Search" id="demo-input-search2">
                            </form>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="demo-pli-download-from-cloud"></i></button>
                            <div class="btn-group dropdown">
                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                    <i class="demo-pli-gear"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('exception'))
                <div class="alert alert-danger">{{ session('exception') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped" id="service-table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="check-all"></th>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Ảnh</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listNewCategory as $item)
                            <tr>
                                <td><input type="checkbox" class="check" value="{{ $item->id }}"></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td><img src="{{ asset($item->category_image) }}" alt="" width="100"></td>
                                <td>
                                    <a href="{{ route('newCategories.edit', $item->id) }}"
                                        class="label label-table label-success">Sửa</a>


                                    <form id="deleteForm{{ $item->id }}"
                                        action="{{ route('newCategories.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button data-form="deleteForm{{ $item->id }}"
                                        class="label label-table label-danger btn-delete"
                                        style="border: none">Xóa</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $listNewCategory->links() }}
                </table>
            </div>
        </div>
    </div>

@endsection
