@extends('layout.master')
@section('page-title', 'Dịch vụ')
@section('page-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Dịch vụ</h3>
        </div>

        <!--Data Table-->
        <!--===================================================-->
        <div class="panel-body">
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <a href="{{route('service.create')}}"><button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> Thêm dịch vụ</button></a>
                        <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
                            <button class="btn btn-default"><i class="demo-pli-recycling"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-6 table-toolbar-right">
                        <div class="form-group">
                            <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                                autocomplete="off">
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
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>TÊN DỊCH VỤ</th>
                            <th>GIÁ</th>
                            <th>TRẠNG THÁI</th>
                            <th>Ảnh</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($service as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->service_name}}</td>
                            <td>{{number_format($item->price)}}VNĐ</td>
                            <td>{{$item->is_active == 1 ? 'active': 'deactive'}}</td>
                            <td><img src="{{asset($item->image)}}" alt="" width="100"></td>
                            <td>
                                <a href="{{ route('service.edit', $item->id) }}" class="label label-table label-success">Edit</a>


                                <form id="deleteForm{{ $item->id }}" action="{{ route('service.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button data-form="deleteForm{{$item->id}}" class="label label-table label-danger btn-delete" style="border: none" >Delete</button>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
