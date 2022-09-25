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
                        <a href="{{ route('service.create') }}"><button id="demo-btn-addrow" class="btn btn-purple"><i
                                    class="demo-pli-add"></i> Thêm dịch vụ</button></a>
                        <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
                            <button class="btn btn-default" id="multi-delete" data-route="{{ route('service.deleteSelected') }}"><i
                                    class="demo-pli-recycling"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-6 table-toolbar-right">
                        <div class="form-group">
                            <form action="{{ route('service.search') }}" method="get">
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
                <table class="table table-striped" id="service-table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="check-all"></th>
                            <th>@sortablelink('id', 'ID')</th>
                            <th>@sortablelink('servicec_name', 'TÊN DỊCH VỤ')</th>
                            <th>@sortablelink('price', 'GIÁ')</th>
                            <th>TRẠNG THÁI</th>
                            <th>Ảnh</th>
                            <th>Thuộc dịch vụ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                            <tr>
                                <td><input type="checkbox" class="check" value="{{ $item->id }}"></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ number_format($item->price) }}VNĐ</td>
                                <td>{{ $item->is_active == 1 ? 'active' : 'deactive' }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" width="100"></td>
                                <td>
                                    @foreach ($parentServices as $parentService)
                                        @if ($item->parent_id === $parentService->id)
                                            {{$parentService->service_name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('service.edit', $item->id) }}"
                                        class="label label-table label-success">Edit</a>


                                    <form id="deleteForm{{ $item->id }}"
                                        action="{{ route('service.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button data-form="deleteForm{{ $item->id }}"
                                        class="label label-table label-danger btn-delete"
                                        style="border: none">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{$service->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
@section('page-js')
    <script>
        $(document).ready(function() {

            $("#service-table").TableCheckAll();

            $('#multi-delete').on('click', function() {
                var button = $(this);
                var selected = [];
                $('#service-table .check:checked').each(function() {
                    selected.push($(this).val());
                });

                Swal.fire({
                    icon: 'warning',
                    title: 'Bạn có muốn xóa những dòng record này không?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: button.data('route'),
                            data: {
                                'selected': selected
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location = '/posts'
                                });
                            }
                        });
                    }
                });
            });

            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                var button = $(this);

                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure you want to delete this record?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: button.data('route'),
                            data: {
                                '_method': 'delete'
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location = '/admin/service'
                                });
                            }
                        });
                    }
                });

            })
        });
    </script>
@endsection
