@extends('layout.master')
@section('page-title', 'Đặt lịch')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách đặt lịch</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('room-add')
                                    <a href="{{ route('schedules.create') }}" class="btn btn-purple"><i
                                            class="demo-pli-add icon-fw"></i>Add</a>
                                    <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                @endcan
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">

                                <div class="form-group">
                                    <form action="{{ route('schedules.search') }}" method="get">
                                        <input type="text" autocomplete="off" name="key" class="form-control"
                                            placeholder="Search" id="demo-input-search2">
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
                                    <th>@sortablelink('id')</th>
                                    <th>@sortablelink('fullname', 'Họ và tên')</th>
                                    <th>@sortablelink('birthday', 'Ngày sinh')</th>
                                    <th>@sortablelink('gender', 'Giới tính')</th>
                                    <th>@sortablelink('phone', 'SĐT')</th>
                                    <th>@sortablelink('email', 'Email')</th>
                                    <th>@sortablelink('address', 'Địa chỉ')</th>
                                    <th>@sortablelink('cmnd', 'CMND')</th>
                                    <th>@sortablelink('content', 'Nội dung')</th>
                                    <th>@sortablelink('date', 'Ngày đặt lịch')</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @foreach ($listSchedules as $item)
                                    <tr>
                                        <td><a href="#" class="btn-link">#{{ $item->id }}</a></td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->birthday }}</td>
                                        <td>{{ $item->gender ? 'Nam' : 'Nữ' }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->cmnd }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td class="text-center">
                                            @can('room-edit')
                                                <a href="{{ route('schedules.edit', $item->id) }}"
                                                    class="label label-table label-success">Edit</a>
                                            @endcan
                                            @can('room-delete')
                                                <form id="deleteForm{{ $item->id }}"
                                                    action="{{ route('schedules.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button data-form="deleteForm{{ $item->id }}"
                                                    class="label label-table label-danger btn-delete"
                                                    style="border: none">Delete</button>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pull-right">

                        {{ $listSchedules->links() }}
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection
