<?php

namespace App\Http\Controllers\Backend\WebSetting;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSettingRequest;
use App\Models\WebSetting;

class WebSettingController extends Controller
{

    public function edit ($id) {
        $webSetting = WebSetting::find($id);
        return view('pages.webSetting.edit', compact('webSetting'));
    }

    public function update(WebSettingRequest $request, $id) {
        $webSetting = WebSetting::find($id);
        $webSetting->fill($request->all());
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $webSetting->logo = fileUploader($file, 'webSetting', 'uploads/webSetting');
        }
        $webSetting->update();
        return redirect()->back()->with('message', 'Cập nhật thông tin phòng khám thành công!');
    }
}
