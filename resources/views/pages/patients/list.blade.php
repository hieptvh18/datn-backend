@extends('layout.master')
@section('page-title', 'Bệnh án')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $pageTitle }}</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="{{ route('patient.create') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>

                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"
                                        onclick="
                                        if(confirm('Xóa item đã chọn?')){

                                        }
                                    "><i
                                            class="demo-pli-trash icon-lg"></i></button>
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('patient.importPatient') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        <input type="file" class="form-control" name="file" id="">
                                        <button class="btn btn-default">
                                            <i class="demo-pli-upload-to-cloud icon-lg"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
                                </div>
                                <div class="form-group">
                                    <form action="{{ route('patient.exportPatient') }}" method="post">
                                        @csrf
                                        <input type="date" name="date" autocomplete="off" class="form-control">
                                        <button class="btn btn-default">
                                            <i class="demo-pli-download-window icon-lg"></i></button>
                                        {{-- class="demo-pli-download-from-cloud icon-lg"></i></button> --}}
                                    </form>
                                </div>

                                <div class="btn-group">

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
                        @if (session('exception'))
                            <div class="alert alert-danger">{{ session('exception') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="" id="">
                                    </th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Năm sinh</th>
                                    <th class="text-center">CMND/CCCD</th>
                                    <th class="text-center">Mô tả ngắn</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr class="text-center">
                                        <td class="text-left"> <input type="checkbox" name="" id="">
                                        </td>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->customer_name }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->birthday }}</td>
                                        <td>{{ $patient->cmnd }}</td>
                                        <td>{{ substr($patient->description, 50) }}...</td>
                                        <td>
                                            @if ($patient->status == 1)
                                                <div class="label label-table label-danger">Chưa điều trị</div>
                                            @elseif($patient->status == 0)
                                                <div class="label label-table label-warning">Đã khám</div>
                                            @else
                                                <div class="label label-table label-success">Đã điều trị</div>
                                            @endif
                                        <td>
                                            <form id="deleteForm{{ $patient->id }}"
                                                action="{{ route('patient.destroy', $patient->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button data-form="deleteForm{{ $patient->id }}"
                                                class="label label-table label-danger btn-delete"
                                                style="border: none">Xóa</button>
                                            <a href="{{ route('patient.edit', $patient->id) }}"
                                                class="label label-table label-warning">
                                                Sửa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
