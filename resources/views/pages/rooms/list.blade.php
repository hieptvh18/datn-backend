@extends('layout.master')
@section('page-title', 'Danh sách phòng ban')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách phòng ban</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('room-add')
                                <a href="{{ route('rooms.create') }}" class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Thêm</a>
                                {{-- <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button> --}}
                                @endcan
                                <div class="btn-group">
                                    {{-- <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button> --}}
                                    <button class="btn btn-default" id="delete-multiple" data-route="{{ route('rooms.deleteMultiple') }}"><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('rooms.search') }}" method="get">
                                    <input type="text" autocomplete="off" name="key" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped Card">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="Parent"></th>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('room_name', 'Tên phòng ban')</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listroom as $item)

                                <tr>
                                    <td><input type="checkbox" class="Childrent" name="room_id[]" value="{{$item->id}}"></td>
                                    <td><a href="#" class="btn-link">#{{$item->id}}</a></td>
                                    <td>{{$item->room_name}}</td>
                                    <td class="text-center">
                                        @can('room-edit')
                                        <a href="{{ route('rooms.edit', $item->id) }}" class="label label-table label-success">Sửa</a>
                                        @endcan
                                        @can('room-delete')
                                        <form id="deleteForm{{ $item->id }}" action="{{ route('rooms.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button data-form="deleteForm{{$item->id}}" class="label label-table label-danger btn-delete" style="border: none" >Xóa</button>
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
                        {{$listroom->links()}}
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>


@endsection
