@extends('layout.master')
@section('page-title', 'Danh sách vai trò')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách vai trò</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('role-add')
                                <a href="{{ route('roles.create') }}" class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Thêm</a>
                                {{-- <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button> --}}
                                @endcan
                                {{-- <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
                                </div> --}}
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('roles.search') }}" method="get">
                                        <input type="text" autocomplete="off" name="key" class="form-control"
                                            placeholder="Search" id="demo-input-search2">
                                    </form>
                                </div>
                                {{-- <div class="btn-group">
                                    <button class="btn btn-default"><i
                                            class="demo-pli-download-from-cloud icon-lg"></i></button>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-default btn-active-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="demo-pli-dot-vertical icon-lg"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên vai trò</th>
                                   @can(['role-edit', 'role-delete'])
                                   <th class="text-center">Hành động</th>
                                   @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listRole as $item)

                                <tr>
                                    <td><a href="#" class="btn-link">#{{$item->id}}</a></td>
                                    <td>{{$item->role_name}}</td>

                                    <td class="text-center">
                                        @can('role-edit')
                                        <a href="{{ route('roles.edit', $item->id) }}" class="label label-table label-success">Sửa</a>
                                        @endcan
                                        @can('role-delete')
                                        <form id="deleteForm{{ $item->id }}" action="{{ route('roles.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button data-form="deleteForm{{$item->id}}"  class="label label-table label-danger btn-delete" style="border: none" >Xóa</button>
                                        @endcan
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        {{-- <ul class="pagination text-nowrap mar-no">
                            <li class="page-pre disabled">
                                <a href="#">&lt;</a>
                            </li>
                            <li class="page-number active">
                                <span>1</span>
                            </li>
                            <li class="page-number">
                                <a href="#">2</a>
                            </li>
                            <li class="page-number">
                                <a href="#">3</a>
                            </li>
                            <li>
                                <span>...</span>
                            </li>
                            <li class="page-number">
                                <a href="#">9</a>
                            </li>
                            <li class="page-next">
                                <a href="#">&gt;</a>
                            </li>
                        </ul> --}}
                        {{$listRole->links()}}
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>


@endsection
