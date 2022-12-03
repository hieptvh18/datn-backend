<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPermission = Permission::where('parent_id', 0)->orderBy('id', 'desc')->paginate(10);

        return view('pages.permissions.list', compact('listPermission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {

        $parentPermission = new Permission();
        $parentPermission->permission_name = $request->parent;
        $parentPermission->permission_key_code = '';
        $parentPermission->parent_id = 0;
        $parentPermission->save();

        foreach ($request->childrent as $childrent) {
            $parentPermission->getChildrentPermission()->create([
                'permission_name' => $childrent . ' ' . $request->parent,
                'permission_key_code' => $childrent . '_' . $request->parent,
                'parent_id' => $parentPermission->id
            ]);
        }

        return redirect()->route('permissions.index')->with(['message' => 'Tạo mới Permission thành công!']);
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
        $permission = Permission::find($id);
        return view('pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::find($id);

        $permission->permission_name = $permission->permission_name;
        $permission->permission_key_code = $permission->permission_key_code;
        $permission->parent_id = $permission->parent_id;
        $permission->update();

        $permission->getChildrentPermission()->delete();

        foreach ($request->childrent as $childrent) {
            $permission->getChildrentPermission()->create([
                'permission_name' => $childrent . ' ' . $request->parent,
                'permission_key_code' => $childrent . '_' . $request->parent,
                'parent_id' => $permission->id
            ]);
        }

        return redirect()->route('permissions.index')->with(['message' => 'Cập nhật Permission thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parentPermission = Permission::find($id);
        $parentPermission->getChildrentPermission()->delete();
        $parentPermission->delete();

        return redirect()->route('permissions.index')->with(['message' => 'Xóa Permission thành công!']);
    }
}
