@extends('layout.master')
@section('page-title', 'Tạo mới vai trò')
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
                            <label for="" class="form-label"><b>Tên vai trò</b></label>
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
                                    Chọn tất cả
                                </label>
                            </div>

                            @foreach($permissionParent as $parentItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header" style="background: aqua">
                                        <label>
                                            <input type="checkbox" value="" class="checkbox_wrapper">
                                        </label>
                                        @php
                                             foreach (Config::get('permissions.parent') as $key => $parent) {
                                                if($key == $parentItem->permission_name){
                                                    $parentItem->permission_name = $parent;
                                                }
                                             }

                                         @endphp
                                             <label for=""><h4>{{ $parentItem->permission_name }}</h4></label>
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
                                                    @php
                                                    foreach (Config::get('permissions.childrent') as $key => $childrent){
                                                    foreach (Config::get('permissions.parent') as $keyParent => $parent){
                                                        if($key == explode(' ', $childrentItem->permission_name)[0]){
                                                            if(explode(' ', $childrentItem->permission_name)[1] == $keyParent){
                                                            $childrentItem->permission_name = $childrent .' '. explode(' ', $parent, 3)[2];
                                                            }
                                                        }
                                                        }
                                                    }
                                                @endphp
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
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-info">Back</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>

@endsection

