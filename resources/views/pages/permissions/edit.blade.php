@extends('layout.master')
@section('page-title', 'Cập nhật quyền')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập nhật quyền</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mô-đun</h3>
                                <input type="hidden" class="form-control" name="id" value="{{ $permission->id }}">
                            </div>
                            <div class="panel-body">
                                <select id="demo-select2" name="permission_name" class="demo_select2 form-control">
                                    <optgroup label="Select permission parent">
                                        @foreach (Config::get('permissions.parent') as $key => $parent)
                                        @if ($permission->permission_name == $key)

                                        <option selected value="{{$key}}">{{$parent}}</option>
                                        @else

                                        <option value="{{$key}}">{{$parent}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('permission_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="panel col-md-6">
                                <h4 class="text-main">Các quyền</h4>
                                <ul class="list-inline">
                                    @foreach (Config::get('permissions.childrent'); as $key => $childrent)

                                    <li>
                                        <input id="demo-sw-sz-lg" name="childrent[]" type="checkbox" {{$permission->getChildrentPermission->contains('permission_name', $key .' '. $permission->permission_name) ? 'checked':''}} value="{{$key}}">
                                        <label class="form-check-label" for="inlineCheckbox1">{{$childrent}}</label>

                                    </li>
                                    @endforeach

                                </ul>
                                @error('childrent')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Lưu thay đổi</button>
                    <button class="btn btn-danger" type="reset">Nhập lại</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-info">Quay lại</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>
@endsection

