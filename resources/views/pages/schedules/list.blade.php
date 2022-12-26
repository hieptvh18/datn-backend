@extends('layout.master')
@section('page-title', 'Đặt lịch')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading" style="display: flex; justify-content: space-between;">
                    <h3 class="panel-title">Danh sách đặt lịch</h3>
                    <h4 class="panel-title">Xuất/Nhập</h4>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('room-add')
                                    <a href="{{ route('schedules.create') }}" class="btn btn-purple"><i
                                            class="demo-pli-add icon-fw"></i>Tạo mới</a>
                                    {{-- <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button> --}}
                                @endcan
                                <div class="btn-group">
                                    {{-- <a href=""><button class="btn btn-primary">Reload</button></a>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button> --}}
                                    <a class="btn btn-secondary" href="{{ route('schedules.index') }}">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-6 table-toolbar-right">

                                <div class="form-group">
                                    <form action="{{ route('schedules.search') }}" method="get">
                                        <input type="text" autocomplete="off" name="key" class="form-control"
                                            placeholder="Search" id="demo-input-search2">
                                    </form>
                                </div>
                                <div class="form-group">
                                    <form action="{{ route('schedules.export') }}" method="post">
                                        @csrf
                                        <input type="date" name="date" autocomplete="off" class="form-control">
                                        <button class="btn btn-default" title="Xuất lịch khám">
                                            <i class="demo-pli-download-window icon-lg"></i></button>
                                        {{-- class="demo-pli-download-from-cloud icon-lg"></i></button> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: flex; padding: 0 10px">
                            <div style="width: 60%;">
                                <form action="
                                @if (in_array('searching',explode('/',request()->url())))
                                    {{route('schedules.index')}}
                                @endif
                                " method="GET" class="" autocomplete="off">
                                    <div class="row">
                                        <div id="demo-dp-range" class="col-sm-11" style="display: flex">
                                            <div class="input-daterange input-group">
                                                <input id="fromdatepicker"
                                                    value="{{ isset(request()->start) ? request()->start : '' }}"
                                                    type="text" class="form-control" name="start"
                                                    placeholder="Từ ngày" />
                                                <span class="input-group-addon">to</span>
                                                <input id="todatepicker"
                                                    value="{{ isset(request()->end) ? request()->end : '' }}" type="text"
                                                    placeholder="Đến ngày" class="form-control" name="end" />
                                            </div>
                                            <div class="status-box">
                                                <select name="status" class="selectpicker">
                                                    <option value="" {{!request()->status ? 'selected' : ''}}>Chọn trạng thái</option>
                                                    <option value="0" {{ request()->status != null &&  request()->status == 0 ? 'selected' : '' }}>Chờ xác
                                                        nhận</option>
                                                    <option value="1" {{ request()->status == 1 ? 'selected' : '' }}>Đã xác
                                                        nhận</option>
                                                    <option value="2" {{ request()->status == 2 ? 'selected' : '' }}>Đã hủy
                                                    </option>
                                                    <option value="3" {{ request()->status == 3 ? 'selected' : '' }}>Đã khám
                                                    </option>
                                                    {{-- <option value="1" {{ $item->status == 1 && $item->is_rebooking == 1 ? 'selected' : '' }}>Đã xác
                                                        nhận khám lại</option> --}}

                                                </select>
                                            </div>
                                            <div class="btn-group col-sm-8">
                                                <a href=""><button class="btn btn-primary" type="submit">Lọc</button></a>
                                                {{-- <a class="btn btn=secondary" href="{{ route('schedules.index') }}">
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a> --}}
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div style="width: 50%; text-align: right">
                                <form action="{{ route('schedules.import') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-group">

                                        {{-- <label class="col-md-5 control-label">Tệp</label> --}}
                                        <div class="col-md-7">
                                            <span class="pull-left btn btn-primary btn-file">
                                                Browse... <input type="file" name="file">
                                            </span>
                                        </div>
                                    </div>
                                    <button class="btn btn-default" title="Nhập lịch khám">
                                        <i class="demo-pli-upload-to-cloud icon-lg"></i></button>
                                    @error('file')
                                        <span style="color: red; text-align: left; margin: 5px">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id')</th>
                                    <th>@sortablelink('fullname', 'Họ và tên')</th>
                                    {{-- <th>@sortablelink('birthday', 'Ngày sinh')</th> --}}
                                    <th>@sortablelink('gender', 'Giới tính')</th>
                                    <th>@sortablelink('phone', 'SĐT')</th>
                                    <th>@sortablelink('email', 'Email')</th>
                                    <th>@sortablelink('date', 'Ngày đặt lịch')</th>
                                    <th>@sortablelink('counter', 'Số thứ tự')</th>
                                    <th>Trạng thái</th>
                                    <th>
                                        <div class="dropdown">
                                            <span class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Xác nhận khám lại <i class="dropdown-caret"></i>
                                            </span>
                                            <ul class="dropdown-menu" style="">
                                                <li class="dropdown-header">Lọc</li>
                                                <li>
                                                    <a href="
                                                        @if (!request()->rebook && !empty(request()->all()))
                                                        {{url()->full()}}&rebook=1
                                                        @elseif (!request()->rebook && empty(request()->all()))
                                                            {{url()->full()}}?rebook=1
                                                            @else
                                                            {{url()->full()}}
                                                        @endif

                                                    ">Đã xác nhận khám lại</a></li>
                                                {{-- <li class="divider"></li>
                                                <li><a href="{{route('schedules.index')}}">Tất cả</a></li> --}}
                                            </ul>
                                        </div>
                                    </th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @foreach ($listSchedules as $item)
                                    <tr>
                                        <td><a href="#" class="btn-link">#{{ $item->id }}</a></td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->birthday == null ? '':$item->birthday }}</td>
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
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->counter ? $item->counter : 'Chưa xếp' }}</td>

                                        <td class="change-status" data-schedule-id={{ $item->id }}>

                                            @if ($item->status == 0)
                                                <span class="label label-default">Chờ xác nhận</span>
                                                {{-- @elseif($item->status == 1 && $item->is_rebooking == 1)
                                                <span class="label label-warning">Khám lại</span> --}}
                                                @elseif($item->status == 1)
                                                <span class="label label-primary">Đã xác nhận</span>
                                                @elseif($item->status == 2)
                                                <span class="label label-danger">Đã hủy</span>
                                                @elseif($item->status == 3)
                                                <span class="label label-success">Đã khám</span>

                                                @endif
                                        </td>
                                        <td>
                                            <span class="label label-{{$item->is_rebooking ? 'primary' : 'warning'}}">{{$item->is_rebooking ? 'Đã xác nhận' : 'Không xác nhận'}}</span>

                                        </td>
                                        <td class="text-center">
                                            @can('schedule-edit')
                                                <a style="margin-bottom: 5px" href="{{ route('schedules.edit', $item->id) }}"
                                                    class="label label-table label-success">Chi tiết</a>
                                            @endcan
                                            @if ($item->status == 1)
                                                <a style="margin-bottom: 5px"
                                                    href="{{ route('patient.show', $item->id) }}"
                                                    class="label label-table label-info">Tạo bệnh án</a>
                                            @elseif ($item->status == 3)
                                                <a style="margin-bottom: 5px"
                                                    href="{{ route('patient.edit', $item->patient_id) }}"
                                                    class="label label-table label-info">Xem hồ sơ bệnh án</a>
                                            @endif
                                            @can('schedule-delete')
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

        </div>
    </div>
    </div>

@endsection
@section('page-js')
    <script>
        $(document).ready(function() {
            $('#fromdatepicker').datepicker();
            // $('#datetimepicker2').datetimepicker({
            //          locale: 'ruu'
            //      });
        })
        $(document).ready(function() {
            $('#todatepicker').datepicker();
            // $('#datetimepicker2').datetimepicker({
            //          locale: 'ruu'
            //      });
        })
    </script>

    <script type="text/javascript">
        // $(document).ready(function() {
        //     var scheduleId = null;
        //     $('body').on('click', 'td.change-status', function() {
        //         scheduleId = $(this).data('schedule-id');
        //     })
        //     $('body').on('click', 'td.change-status ul.dropdown-menu li', function() {
        //         var status = $(this).data('original-index');

        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             url: "{{ route('schedule.ajax.changestatus') }}",
        //             type: 'POST',
        //             data: {
        //                 'scheduleId': scheduleId,
        //                 'status': status
        //             },
        //             dataType: 'json',
        //             success: function(res) {
        //                 console.log(res);
        //             }

        //         })
        //     })
        // })
    </script>
@endsection
