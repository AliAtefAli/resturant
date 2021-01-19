<?php

use App\Models\Setting;

if (!function_exists('lang')) {
    function lang()
    {
        return app()->getLocale() ? app()->getLocale() : app()->setLocale('ar');
    }
}

if (!function_exists('langs_trans')) {
    function langs_str()
    {
        return implode(',',Config::get('languages'));
    }
}
if (!function_exists('lang_trans')) {
    function lang_str()
    {
        return lang() == 'ar' ? 'English' : 'العربية';
    }
}
if (!function_exists('activeSidebar')) {
    function activeSidebar($uri = '')
    {
        $active = '';
        if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
            $active = 'active';
        }
        return $active;
    }
}

if (!function_exists('getSetting')) {
    function getSetting()
    {
        $setting = Setting::all()->pluck('value', 'key');

        return $setting;
    }
}


