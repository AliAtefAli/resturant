<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class SettingController extends Controller
{
    use Uploadable;

    public function general()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', compact('setting'));
    }

    public function updateGeneral(UpdateSettingRequest $request, Setting $setting)
    {

        $data = $request->validated();

        if ($request->has('logo')) {
            if (file_exists(public_path('assets/products/' . $setting->logo))) {
                unlink(public_path('assets/products/' . $setting->path));
            }

            $path = $this->uploadOne($request->logo, 'settings', null, null);
            $data['logo'] = $path;
        }
        $setting->update( $data );

        return redirect()->route('dashboard.setting.general')->with('success', trans('dashboard.It was done successfully!'));
    }
}

