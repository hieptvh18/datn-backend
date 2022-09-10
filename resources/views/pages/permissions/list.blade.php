@extends('layout.master')
@section('page-title', 'Quyền')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Permissions</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('permission-add')
                                <a href="{{ route('permissions.create') }}" class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                @endcan
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
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
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Permission name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listPermission as $item)

                                <tr>
                                    <td><a href="#" class="btn-link">#{{$item->id}}</a></td>
                                    <td>{{$item->permission_name}}</td>
                                    @if ($item->parent_id == 0)
                                    <td class="text-center">
                                        @can('permission-edit')
                                        <a href="{{ route('permissions.edit', $item->id) }}" class="label label-table label-success">Edit</a>
                                       @endcan
                                        @can('permission-delete')
                                        <form id="deleteForm{{ $item->id }}" action="{{ route('permissions.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button data-form="deleteForm{{ $item->id }}" class="label label-table label-danger btn-delete" style="border: none" >Delete</button>
                                        @endcan
                                    </td>
                                    @endif

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pull-right">

                        {{$listPermission->links()}}
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>
@endsection
