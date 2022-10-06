<?php

namespace App\Http\Controllers\Backend\Localization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function changeLanguage($language)
{
    Session::put('website_language', $language);

    return redirect()->back();
}

}
