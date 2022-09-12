@extends('layout.master')
@section('page-title', 'Vai trò')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tạo mới vai trò</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Role name</b></label>
                            <input type="text" class="form-control" name="role_name" value="{{old('role_name')}}" placeholder="Admin...">
                            @error('role_name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" class="checkall">
                                    Checkall
                                </label>
                            </div>

                            @foreach($permissionParent as $parentItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header" style="background: aqua">
                                        <label>
                                            <input type="checkbox" value="" class="checkbox_wrapper">
                                        </label>
                                      <label for=""><h4>  Module {{ $parentItem->permission_name }}</h4></label>
                                    </div>
                                    <div class="row">
                                        @foreach($parentItem->getChildrentPermission as $childrentItem)
                                            <div class="card-body text-primary col-md-3">
                                                <h5 class="card-title">
                                                    <label>
                                                        <input type="checkbox" name="permission_id[]"
                                                               class="checkbox_childrent"
                                                               value="{{ $childrentItem->id }}">
                                                    </label>
                                                    {{ $childrentItem->permission_name }}
                                                </h5>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach

                            @error('permission_id')
                           <div style="margin-bottom: 15px">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           </div>
                        @enderror


                        </div>


                    </div>


                    <button class="btn btn-primary">Save</button>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

