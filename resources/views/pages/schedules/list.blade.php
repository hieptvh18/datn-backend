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
                                    {{-- <a href=""><button class="btn btn-primary">Reload</button></a> --}}
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
                                <div class="form-group">
                                    <form action="{{ route('schedules.export') }}" method="post">
                                        @csrf
                                        <input type="date" name="date" autocomplete="off" class="form-control">
                                        <button class="btn btn-default">
                                            <i class="demo-pli-download-window icon-lg"></i></button>
                                        {{-- class="demo-pli-download-from-cloud icon-lg"></i></button> --}}
                                    </form>
                                </div>
                                <div class="btn-group">
                                    {{-- <button class="btn btn-default"><i
                                            class="demo-pli-download-from-cloud icon-lg"></i></button> --}}
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
                        <div class="row" style="display: flex; padding: 0 10px">

                            <div style="width: 72%;">
                                <form action="" method="GET" class="">
                                    <div class="row">
                                        <div id="demo-dp-range" class="col-sm-6" style="display: flex">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input value="{{ isset(request()->start) ? request()->start : '' }}"
                                                    type="text" class="form-control" name="start"
                                                    placeholder="Ngày bắt đầu" />
                                                <span class="input-group-addon">to</span>
                                                <input value="{{ isset(request()->end) ? request()->end : '' }}"
                                                    type="text" placeholder="Ngày kết thúc" class="form-control"
                                                    name="end" />
                                            </div>
                                            <div class="btn-group col-sm-8">
                                                <a href=""><button class="btn btn-primary">Lọc</button></a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div style="width: 28%; text-align: right">
                                <form action="{{ route('schedules.import') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="file" class="form-control" name="file" id="">
                                    <button class="btn btn-default">
                                        <i class="demo-pli-upload-to-cloud icon-lg"></i></button>
                                    @error('file')
                                        <p style="color: red; text-align: left; margin: 5px">{{ $message }}</p>
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
                                    <th>@sortablelink('birthday', 'Ngày sinh')</th>
                                    <th>@sortablelink('gender', 'Giới tính')</th>
                                    <th>@sortablelink('phone', 'SĐT')</th>
                                    <th>@sortablelink('email', 'Email')</th>
                                    <th>@sortablelink('cmnd', 'CMND')</th>
                                    <th>@sortablelink('date', 'Ngày đặt lịch')</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="results">
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
                                        <td>{{ $item->date }}</td>
                                        <td class="change-status" data-schedule-id={{$item->id}}>
                                            <select class="selectpicker">
                                                <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Chờ xác
                                                    nhận</option>
                                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Đã xác
                                                    nhận</option>
                                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Đã hủy
                                                </option>
                                                <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>Đã khám
                                                </option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            @can('room-edit')
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

        </div>
    </div>
    </div>

@endsection
@section('page-js')
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker();
            // $('#datetimepicker2').datetimepicker({
            //          locale: 'ruu'
            //      });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var scheduleId = null;
            $('body').on('click','td.change-status',function(){
                scheduleId = $(this).data('schedule-id');
            })
            $('body').on('click', 'td.change-status ul.dropdown-menu li', function() {
                var status = $(this).data('original-index');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('schedule.ajax.changestatus')}}",
                    type: 'POST',
                    data: {
                        'scheduleId':scheduleId ,
                        'status':status
                    },
                    dataType:'json',
                    success: function(res){
                        console.log(res);
                    }

                })
            })
        })
    </script>
@endsection
