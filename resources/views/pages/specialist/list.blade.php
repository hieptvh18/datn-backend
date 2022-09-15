@extends('layout.master')
@section('page-title', 'Chuyên khoa')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Quản lý chuyên khoa</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="{{ route('specialist.add') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default" onclick="
                                        if(confirm('Xóa item đã chọn?')){

                                        }
                                    "><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="" id="">
                                    </th>
                                    <th>ID</th>
                                    <th>Tên chuyên khoa</th>
                                    <th>Chức năng</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialists as $specialist)
                                    <tr>
                                        <td><input type="checkbox" name="" value=""></td>
                                        <td><a href="#" class="btn-link">#{{ $specialist->id }}</a></td>
                                        <td>{{ $specialist->specialist_name }}</td>
                                        <td>{{ substr($specialist->function, 50) }}...</td>
                                        <td class="text-center">
                                            @if ($specialist->is_active)
                                                <div class="label label-table label-success">ON</div>
                                            @else
                                                <div class="label label-table label-danger">OFF</div>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <form method="post" action="{{ route('specialist.delete', $specialist->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    onclick="
                                                if(!confirm('Bạn chắc chắn muốn xóa bỏ?')){
                                            event.preventDefault();
                                        }
                                                "><i
                                                        class="demo-pli-trash icon-lg"></i></button>
                                            </form>

                                            <a href="{{ route('specialist.edit', $specialist->id) }}"><button
                                                    class="btn btn-warning">Sửa</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $specialists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection