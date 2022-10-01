@extends('layout.master')
@section('page-title', 'Sản phẩm')
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
                                <a
                                {{-- data-parent="#demo-acc-info-outline" data-toggle="collapse"
                                    href="#demo-acd-info-outline-2" --}}
                                     href="{{ route('product.create') }}">
                                    <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                </a>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default" id="delete-multiple" data-route="{{ route('product.deleteMultiple') }}"><i class="demo-pli-trash icon-lg"></i></button>
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
                        <table class="table table-striped Card">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="Parent" name="" id="">
                                    </th>
                                    <th>ID</th>
                                    <td>Tên</td>
                                    <td>Giá</td>
                                    <td>Loại sản phẩm</td>
                                    <td>Ảnh</td>
                                    <td>Hành động</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="text-center">
                                        <td class="text-left"> <input type="checkbox" class="Childrent" name="product_id[]" value="{{$product->id}}">
                                        </td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ $product->types->name }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="" width="100px"></td>
                                        <td>
                                            <form id="deleteForm{{ $product->id }}"
                                                action="{{ route('product.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button data-form="deleteForm{{ $product->id }}"
                                                class="label label-table label-danger btn-delete"
                                                style="border: none">Xóa</button>
                                            <a href="{{ route('product.edit', $product->id) }}"
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
