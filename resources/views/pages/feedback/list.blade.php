@extends('layout.master')
@section('page-title', 'Đánh giá')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Đánh giá</h3>
        </div>

        <!--Data Table-->
        <!--===================================================-->
        <div class="panel-body">
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <a href="{{ route('feedback.create') }}"><button id="demo-btn-addrow" class="btn btn-purple"><i
                                    class="demo-pli-add"></i> Thêm</button></a>
                        <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
                            <button class="btn btn-default" id="delete-multiple" data-route="{{ route('feedback.deleteMultiple') }}"><i class="demo-pli-trash icon-lg"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-6 table-toolbar-right">
                        <div class="form-group">
                            <form action="{{ route('feedback.search') }}" method="get">
                            <input type="text" autocomplete="off" name="key" class="form-control" placeholder="Search"
                                id="demo-input-search2">
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
            <div class="table-responsive">
                <table class="table table-striped Card" id="service-table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="Parent"></th>
                            <th>@sortablelink('id', 'ID')</th>
                            <th>@sortablelink('customer_name','Tên khách hàng')</th>
                            <th>@sortablelink('customer_email','Email')</th>
                            <th>Ảnh</th>
                            <th>TRẠNG THÁI</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listFeedback as $item)
                            <tr>
                                <td><input type="checkbox" class="Childrent" name="feedback_id[]" value="{{ $item->id }}"></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_email }}</td>
                                <td><img src="{{ asset($item->customer_avatar) }}" alt="" width="100"></td>
                                <td>
                                    @if ($item->is_active)
                                        <a href="{{ route('feedback.changeStatus', $item->id) }}" class="btn btn-success">Active</a>
                                        @else
                                        <a href="{{ route('feedback.changeStatus', $item->id) }}" class="btn btn-danger">Deactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('feedback.edit', $item->id) }}"
                                        class="label label-table label-success">Sửa</a>


                                    <form id="deleteForm{{ $item->id }}"
                                        action="{{ route('feedback.destroy', $item->id) }}" method="post">
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
                    {{$listFeedback->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection

