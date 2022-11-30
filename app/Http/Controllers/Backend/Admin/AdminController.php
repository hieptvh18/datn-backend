<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Level;
use App\Models\News;
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
        $listAccountAdmin = Admin::select("id","email", "fullname", "phone", "is_active", "avatar")->sortable()->with('roles')->orderby('id', 'desc')->paginate(15);
        return view('pages.admin.list', compact('listAccountAdmin'));
    }

    // change status
    public function updateStatus ($id){
        $admin = Admin::select("is_active")->where("id", $id)->first();
        if($admin->is_active == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        Admin::where('id', $id)->update(['is_active'=>$status]);
        return redirect()->back();
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

        $account_admin->birthday = date('Y-m-d', strtotime($request->birthday));

        $account_admin->password = Hash::make($request->password);


        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
             $account_admin->avatar = fileUploader($file, 'admin', '/uploads/admin');
        }else{
            $account_admin->avatar = 'assets/img/profile-photos/Profile-Icon.png';
        }

        $account_admin->save();


        $account_admin->role_admins()->attach($request->role_id);

        return redirect()->route('account_admins.index')->with(['message'=>'Tạo người dùng thành công!']);
    }

  // edit
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
    public function update(UpdateAdminRequest $request, $id)
    {
        $account_admin = Admin::find($id);

        $account_admin->fill($request->all());

        $account_admin->birthday = date('Y-m-d', strtotime($request->birthday));


        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
             $account_admin->avatar = fileUploader($file, 'admin', '/uploads/admin');
        }

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

        $updateAuthor_id = News::where('author_id', $id)->get();
        foreach($updateAuthor_id as $item){
            $item->author_id = null;
            $item->update();
        }
        Admin::destroy($id);

        return redirect()->route('account_admins.index')->with(['message'=>'Xóa dùng thành công!']);
    }

    // search

    public function search (){
        $key = $_GET['key'];

        $search_text = trim($key);
        try {
            if ($search_text==null) {
                return redirect()->route('account_admins.index');
            } else {
                $listAccountAdmin=Admin::where('id','LIKE', '%'.$search_text.'%')
                ->orwhere('email','LIKE', '%'.$search_text.'%')
                ->orwhere('fullname','LIKE', '%'.$search_text.'%')
                ->orwhere('birthday','LIKE', '%'.$search_text.'%')
                ->orwhere('phone','LIKE', '%'.$search_text.'%')
                ->orwhere('address','LIKE', '%'.$search_text.'%')
                ->orwhere('facebook_url','LIKE', '%'.$search_text.'%')
                ->orwhere('twitter_url','LIKE', '%'.$search_text.'%')
                ->orwhere('email_url','LIKE', '%'.$search_text.'%')
                ->paginate(15);
            }
            return view('pages.admin.list', compact('listAccountAdmin'));
           } catch (\Throwable $th) {
                return $th;
           }
    }
}
