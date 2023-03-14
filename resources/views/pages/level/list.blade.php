@extends('layout.master')
@section('page-title', 'Chức vụ')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Quản lý chức vụ</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                @can('level-add')
                                <a href="{{ route('level.add') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                @endcan
                                {{-- <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button> --}}
                                <div class="btn-group">
                                    {{-- <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button> --}}
                                    <button class="btn btn-default" id="delete-multiple" data-route="{{ route('level.deleteMultiple') }}"><i
                                            class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <form action="{{ route('level.search') }}" method="get">
                                        <input type="text" autocomplete="off" name="key" class="form-control"
                                            placeholder="Search" id="demo-input-search2">
                                    </form>
                                </div>
                                {{-- <div class="btn-group">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped Card">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="" class="Parent" id="">
                                    </th>
                                    <th>STT</th>
                                    <th>Chức vụ</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td><input type="checkbox" name="level_id" class="Childrent" value="{{ $level->id }}"></td>
                                        <td><a href="#" class="btn-link">{{++$i}}</a></td>
                                        <td>{{ $level->name }}</td>
                                        <td>{{ $level->description }}</td>
                                        @can('level-delete')
                                        <td class="text-center">
                                            <form method="post" action="{{ route('level.delete', $level->id) }}">
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
                                        @endcan
                                        @can('level-edit')
                                        <td><a href="{{ route('level.edit', $level->id) }}"><button class="btn btn-warning">Sửa</button></a></td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $levels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
