@extends('layout.master')
@section('page-title', 'Hóa đơn')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách hóa đơn</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                {{-- <a href="{{ route('patient.create') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a> --}}
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

                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('patient.search') }}" method="get">
                                    <input type="text" autocomplete="off" name="key" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
                                    </form>
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
                        <div class="row" style="display: flex;  padding: 0 10px">
                            <div style="width: 72%;">
                                <form action="" method="GET" class="">
                                    <div class="row" >
                                        <div id="demo-dp-range" class="col-sm-6" style="display: flex">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input value="{{isset(request()->start) ? request()->start : ''}}" type="text" class="form-control" name="start" placeholder="Ngày bắt đầu"/>
                                                <span class="input-group-addon">to</span>
                                                <input value="{{isset(request()->end) ? request()->end : ''}}" type="text" placeholder="Ngày kết thúc" class="form-control" name="end" />
                                            </div>
                                            <div class="btn-group col-sm-8">
                                                <a href=""><button class="btn btn-primary">Lọc</button></a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div style="width: 28%; text-align: right">
                                <form action="{{ route('patient.importPatient') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    <input type="file" class="form-control" name="file" id="">
                                    <button class="btn btn-default">
                                        <i class="demo-pli-upload-to-cloud icon-lg"></i></button>
                                    @error('file')
                                        <p style="color: red; text-align: left; margin: 5px 10px">{{$message}}</p>
                                    @enderror

                                </form>
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
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="text-center">
                                        <td class="text-left"> <input type="checkbox" name="" id="">
                                        </td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_phone }}</td>

                                        <td>


                                            <a href="{{ route('order.detail', $order->id) }}"
                                                class="label label-table label-warning">
                                                Chi tiết
                                            </a>

                                            <a style="margin-top: 5px " href="{{ route('order.pdf', $order->id) }}"
                                                class="label label-table label-primary">
                                                Xuất hóa đơn
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{-- {{ $patients->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
