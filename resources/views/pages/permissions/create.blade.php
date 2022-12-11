@extends('layout.master')
@section('page-title', 'Tạo mới quyền')
@section('page-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tạo mới quyền</h3>
                </div>

                <!--Data Table-->
                <!--===================================================-->
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mô-đun</h3>
                            </div>
                            <div class="panel-body">
                                <select id="demo-select2" name="permission_name" class="demo_select2 form-control">
                                    <optgroup label="Select permission parent">
                                        <option value="">Chọn mô-đun</option>
                                        @foreach (Config::get('permissions.parent') as $key => $parent)
                                            <option value="{{$key}}">{{$parent}}</option>
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
                                        <input id="demo-sw-sz-lg"  name="childrent[]" type="checkbox"  value="{{$key}}">
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
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-info">Back</a>

                </form>
                <!--===================================================-->
                <!--End Data Table-->

            </div>
        </div>
    </div>
@endsection

