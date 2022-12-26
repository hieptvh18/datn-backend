@extends('layout.master')
@section('page-title', 'Loại sản phẩm')
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
                                @can('productType-add')
                                <a
                                {{-- data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                    href="#demo-acd-info-outline-2" --}}
                                     href="{{ route('product-type.create') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                @endcan
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
                                        <input type="text" autocomplete="off" name="key" class="form-control"
                                            placeholder="Search" id="demo-input-search2">
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
                        <!--Accordion content-->
                        <div class="panel-collapse collapse" id="demo-acd-info-outline-2">

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
                                    <th>ID</th>
                                    <td>Tên loại</td>
                                    <td>Ảnh</td>
                                    <td>Mô tả</td>
                                    <td>Hành động</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productTypes as $type)
                                    <tr class="text-center">
                                        <td class="text-left"> <input type="checkbox" name="type_id[]" id="">
                                        </td>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td><img src="{{ asset($type->image) }}" alt="" width="100px"></td>
                                        <td>{{ substr($type->description, 50) }}...</td>
                                        <td>
                                            @can('productType-delete')

                                            <form id="deleteForm{{ $type->id }}"
                                                action="{{ route('product-type.destroy', $type->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button data-form="deleteForm{{ $type->id }}"
                                                class="label label-table label-danger btn-delete"
                                                style="border: none">Xóa</button>
                                                @endcan

                                                @can('productType-edit')
                                            <a href="{{ route('product-type.edit', $type->id) }}"
                                                class="label label-table label-warning">
                                                Sửa
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="paginate">
                        {{ $productTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
