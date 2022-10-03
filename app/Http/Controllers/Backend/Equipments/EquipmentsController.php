<?php

namespace App\Http\Controllers\Backend\Equipments;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    
    public function index()
    {
        $equipments = Equipment::paginate(15);
        return view('pages.equipment.list', compact('equipments'))->with('i', (request()->input('page', 1) -1)*15);
    }

    
    public function add()
    {
        $pageTitle = 'Thêm mới trang thiết bị';
        return view('pages.equipment.add', compact('pageTitle'));
    }

    public function save(Request $request)
    {

        $equipment = new Equipment();

        $equipment->fill($request->all());

        if($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->name . '_' . $imageName;
            $equipment->image = $image->storeAs('uploads/equipments', $imageName);
        } else {
            $equipment->image = '';
        }

        $equipment->save();

        return redirect()->route('equipment.index');
    }

    public function delete(Equipment $id)
    {
        if($id->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($id && Equipment::find($id)) {
            $pageTitle = 'Chỉnh sửa trang thiết bị';
            $equipment = Equipment::where('id', $id)->first();
            return view('pages.equipment.edit', compact('equipment', 'pageTitle'));
        }
        return redirect()->back()->with('excep', 'Không tìm thấy thiết bị!');
    }

    public function update(Request $request, $id) {

        $equipment = Equipment::find($id);
        $equipment->fill($request->all());

        if($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->name . '_' . $imageName;
            $equipment->image = $image->storeAs('uploads/equipments', $imageName);
        }

        $equipment->save();
        return redirect()->route('equipment.index');
    }
}