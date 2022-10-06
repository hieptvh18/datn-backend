<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $language = Session::get('website_language', config('app.locale'));
    // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config

    config(['app.locale' => $language]);
    // Chuyển ứng dụng sang ngôn ngữ được chọn

    return $next($request);
}

}
