<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listRole = Role::paginate(5);

        return view('pages.roles.list', compact('listRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParent = Permission::where('parent_id', 0)->get();
        return view('pages.roles.create',compact('permissionParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {

        $role = new Role();

        $role->fill($request->all());

        $role->save();

        $role->permission_roles()->attach($request->permission_id);

        return redirect()->route('roles.index')->with(['message'=>'Tạo mới vai trò thành công!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissionParent = Permission::where('parent_id', 0)->get();
        return view('pages.roles.edit', compact('role', 'permissionParent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);

        $role->role_name = $request->role_name;

        $role->update();

        $role->permission_roles()->sync($request->permission_id);

        return redirect()->route('roles.index')->with(['message'=>'Cập nhật vai trò thành công!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $role = Role::find($id);
    //    $role = Role::destroy($id);
       $role->delete_role_admin()->detach();
       $role->delete();
        return redirect()->route('roles.index')->with(['message'=>'Xóa vai trò thành công!']);
    }
}
