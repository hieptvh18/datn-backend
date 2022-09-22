<?php

namespace App\Http\Controllers\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return \view('pages.service.list',\compact('service',));
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
}
