<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Setting;
use App\Models\Site;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use function Composer\Autoload\includeFile;

class SettingController extends Controller
{
    use Uploadable;
    public function general()
    {
        $settings = Setting::all()->pluck('value', 'key');

        return view('dashboard.settings.general', compact('settings'));
    }

    public function social()
    {
        $settings = Setting::all()->pluck('value', 'key');

        return view('dashboard.settings.social', compact('settings'));
    }

    public function api()
    {
        $settings = Setting::all()->pluck('value', 'key');

        return view('dashboard.settings.api', compact('settings'));
    }

    public function update(UpdateSiteRequest $request)
    {
        $settings = $request->all('settings');

        if ( $request->has('settings.whatsapp') ) {
            $settings['settings']['whatsapp'] = $this->clean($request->input('settings.whatsapp')) ;
        }
        if ( $request->has('settings.phone') ) {
            $settings['settings']['phone'] = $this->clean($request->input('settings.phone')) ;
        }

        if ($request->has('settings.logo')) {
            $settings['settings']['logo'] = $this->uploadOne($request->settings['logo'], 'settings', null, null);
        }

        foreach ($settings['settings'] as $key => $value) {
            $setting = Setting::where('key', $key)->first();


            ($setting) ? $setting->update(['value' => $value]) : Setting::create(['key' => $key, 'value' => $value]);

        }
        return back()->with('success', trans('dashboard.It was done successfully!'));
    }

    private function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
}
