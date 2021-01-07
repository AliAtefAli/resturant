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

        $data = $request->all('settings')['settings']['whatsapp'];

        $data = preg_replace("/\(/", "", $data);
        $data = preg_replace("/\)/", "", $data);
        $data = preg_replace("/ /", "", $data);
        $data = preg_replace("/-/", "", $data);

        $settings['settings']['whatsapp'] = $data;

        if ($request->has('settings.logo')) {
            $settings['settings']['logo'] = $this->uploadOne($request->settings['logo'], 'settings', null, null);
        }

        foreach ($settings['settings'] as $key => $value) {
            $setting = Setting::where('key', $key)->first();


            ($setting) ? $setting->update(['value' => $value]) : Setting::create(['key' => $key, 'value' => $value]);

        }
        return back()->with('success', trans('dashboard.It was done successfully!'));
    }
}
