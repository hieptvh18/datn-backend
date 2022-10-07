<?php

namespace App\Http\Controllers\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::sortable()->orderby('id', 'desc')->paginate(15);
        $parentServices = Service::where('parent_id', \null)->get();
        return \view('pages.service.list',\compact('service','parentServices'));
    }

    public function create()
    {
        $parentServices = Service::where('parent_id', \null)->get();
        return \view('pages.service.create',\compact('parentServices'));
    }

    public function store(ServiceRequest $request)
    {
        // $validatedData = $request->validate();
        $service = new Service;
        $service->service_name = $request['service_name'];
        $service->price = $request['price'];
        $service->is_active = $request->active == true ? 1 : 0;
        $service->parent_id = $request['parent_id'];
        if($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->name . '_' . $imageName;
            $service->image = $image->storeAs('uploads/services', $imageName);
        } else {
            $service->image = '';
        }
        $service->save();
        return \redirect()->route('service.index')->with(['message'=>'Tạo mới dịch vụ thành công!']);;
    }

    public function edit(Service $service)
    {
        $parentServices = Service::where('parent_id', \null)->get();
        return \view('pages.service.edit',\compact('service','parentServices'));
    }

    public function update(ServiceRequest $request, $service)
    {
        $service = Service::find($service);
        $service->service_name = $request['service_name'];
        $service->price = $request['price'];
        $service->is_active = $request->active == true ? 1 : 0;
        $service->parent_id = $request['parent_id'];
        if($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->name . '_' . $imageName;
            $service->image = $image->storeAs('uploads/services', $imageName);
        } else {
            $service->image = '';
        }
        $service->update();
        return \redirect()->route('service.index')->with(['message'=>'Sửa dịch vụ thành công!']);;

    }

    public function destroy(Service $service)
    {
        $service->delete();
        return \redirect()->back()->with(['message'=>'Xóa dịch vụ thành công!']);;
    }
    public function multiDelete(Request $request)
    {
        Service::whereIn('id', $request->get('selected'))->delete();

        return \redirect()->back();
    }

    public function search (){
        $key = $_GET['key'];

        $search_text = trim($key);
        $parentServices = Service::where('parent_id', \null)->get();
        try {
            if($search_text == null){
             return redirect()->route('service.index');
            }else {
            $service=Service::where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('service_name','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }

        return view('pages.service.list', compact('service','parentServices'));
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
