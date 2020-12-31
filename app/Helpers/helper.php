<?php
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
