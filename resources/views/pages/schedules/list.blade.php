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
                                    <a href=""><button class="btn btn-primary">Reload</button></a>
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
                                    <th>Họ tên</th>
                                    <th>Năm sinh</th>
                                    <th>Giới tính</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                    <th>CMND</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listSchedules as $item)
                                    <tr>
                                        <td><a href="#" class="btn-link">#{{ $item->id }}</a></td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->birthday }}</td>
                                        <td>
                                            @if ($item->gender == 1)
                                                Nam
                                            @elseif($item->gender == 2)
                                                Nữ
                                            @else
                                                ...
                                            @endif
                                        </td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->cmnd }}</td>
                                        <td>{{ substr($item->content, 30) }}...</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="label label-purple"> Chờ xác nhận</span>
                                            @elseif($item->status == 1)
                                                <span class="label label-info"> Đã xác nhận</span>
                                            @else
                                                <span class="label label-danger"> Đã hủy lịch</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->date }}</td>
                                        <td class="text-center">
                                            @can('room-edit')
                                                <a href="{{ route('schedules.edit', $item->id) }}"
                                                    class="label label-table label-success">Chi tiết</a>
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
                    {{ $listSchedules->links() }}
                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>
    </div>
    </div>


@endsection
