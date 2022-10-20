<?php

namespace App\Http\Controllers\Backend\WebSetting;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSettingRequest;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index () {
        $webSetting = WebSetting::get(['id', 'logo', 'web_name']);
        return view('pages.webSetting.index', compact('webSetting'));
    }

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
        return redirect()->route('webSetting.index');
    }
}
