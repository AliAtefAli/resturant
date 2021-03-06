<?php

use App\Models\Setting;
use App\Models\SmsSmtp;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Notifications\FinishedSubscriptions;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

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

if (!function_exists('editPhone')){
    function editPhone($phone)
    {
        if (substr($phone, 0, 4) == '+966') {

            $string = str_replace(' ', '', $phone);
            $string = str_replace('-', '', $string);

            return substr($string, 4);

        }elseif(substr($phone, 0, 5) == '00966')
        {
            $string = str_replace(' ', '', $phone);
            $string = str_replace('-', '', $string);

            return substr($string, 5);

        }elseif(substr($phone, 0, 3) == '966')
        {

            $string = str_replace(' ', '', $phone);
            $string = str_replace('-', '', $string);

            return substr($string, 3);

        }
        else
        {
            $string = str_replace(' ', '', $phone);
            $string = str_replace('-', '', $string);
            return $string;
        }
    }

    if (!function_exists('lat')) {
        function lat()
        {
            $latitude  =  "31.29289850688535";
            return $latitude;
        }
    }

    if (!function_exists('lng')) {
        function lng()
        {
            $longitude  =  "37.409769557672135";
            return $longitude;
        }
    }

}




