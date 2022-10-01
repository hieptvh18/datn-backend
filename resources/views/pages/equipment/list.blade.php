@extends('layout.master')
@section('page-title', 'Trang thiết bị')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Quản lý trang thiết bị</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="{{ route('equipment.add') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>

                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default" id="delete-multiple" data-route="{{ route('equipment.deleteMultiple') }}" ><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('equipment.search') }}" method="get">
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
                                            <li><a href="#">Delete selected</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped Card">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="Parent">
                                    </th>
                                    <th>STT</th>
                                    <th>Tên thiết bị</th>
                                    <th>Giá</th>
                                    <th>Image</th>
                                    <th>Kích thước</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listEquipments as $equipment)
                                    <tr>
                                        <td><input  type="checkbox" class="Childrent"  name="equipment_id[]" value="{{$equipment->id}}"></td>
                                        <td><a href="#" class="btn-link">{{++$i}}</a></td>
                                        <td>{{ $equipment->name }}</td>
                                        <td>{{ number_format($equipment->price, 0, '', '.') }}<sup>₫</sup></td>
                                        <td><img src="{{asset($equipment->image)}}" alt="" width="100"></td>
                                        <td>{{ $equipment->size }}</td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('equipment.delete', $equipment->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    onclick="
                                                if(!confirm('Bạn chắc chắn muốn xóa bỏ?')){
                                            event.preventDefault();
                                        }">
                                                    <i class="demo-pli-trash icon-lg"></i></button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('equipment.edit', $equipment->id) }}"><button class="btn btn-warning">Sửa</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $listEquipments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

