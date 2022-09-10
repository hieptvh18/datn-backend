<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Role;
use App\Models\Room;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAccountAdmin = Admin::where('email', '!=', auth('admin')->user()->email)->paginate(5);
        return view('pages.admin.list', compact('listAccountAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_level = Level::select('id','name')->get();
        $list_role = Role::select('id','role_name')->get();
        $list_room = Room::select('id','room_name')->get();
        $list_specialist = Specialist::select('id','specialist_name')->get();
        return view('pages.admin.create', compact('list_level', 'list_room', 'list_specialist', 'list_role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $account_admin = new Admin();

        $account_admin->fill($request->all());

        $account_admin->password = Hash::make($request->password);

        $account_admin->save();

        $account_admin->role_admins()->attach($request->role_id);

        return redirect()->route('account_admins.index')->with(['message'=>'Tạo người dùng thành công!']);
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
        $admin = Admin::find($id);
        $admin_role = DB::table('role_admins')->where('admin_id', $admin->id)->first();
        $list_level = Level::select('id','name')->get();
        $list_role = Role::select('id','role_name')->get();
        $list_room = Room::select('id','room_name')->get();
        $list_specialist = Specialist::select('id','specialist_name')->get();
        return view('pages.admin.edit', compact('admin', 'admin_role', 'list_level', 'list_room', 'list_specialist', 'list_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account_admin = Admin::find($id);

        $account_admin->fill($request->all());

        $account_admin->update();

        $account_admin->role_admins()->sync($request->role_id);

        return redirect()->route('account_admins.index')->with(['message'=>'Cập nhật dùng thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return redirect()->route('account_admins.index')->with(['message'=>'Xóa dùng thành công!']);
    }
}
