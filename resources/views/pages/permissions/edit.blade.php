@extends('layout.master')
@section('page-title', 'Quyền')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">EDIT Permissions</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Permissions Parent</h3>
                            </div>
                            <div class="panel-body">
                                <select id="demo-select2" name="parent" class="demo_select2 form-control">
                                    <optgroup label="Select permission parent">
                                        @foreach (Config::get('permissions.parent') as $parent)
                                        @if ($permission->permission_name == $parent)

                                        <option selected value="{{$parent}}">{{$parent}}</option>
                                        @else

                                        <option value="{{$parent}}">{{$parent}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('parent')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="panel col-md-6">
                                <p class="text-main text-bold">Childrent</p>
                                <ul class="list-inline">
                                    @foreach (Config::get('permissions.childrent'); as $childrent)

                                    <li>
                                        <input id="demo-sw-sz-lg" name="childrent[]" type="checkbox" {{$permission->getChildrentPermission->contains('permission_name', $childrent .' '. $permission->permission_name) ? 'checked':''}} value="{{$childrent}}">
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
                    <button class="btn btn-primary">Save</button>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>
@endsection

