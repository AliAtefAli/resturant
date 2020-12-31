<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class SettingController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        return view('dashboard.setting.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $setting = Setting::find(1);
//        dd($request->all());
        $setting->update($request->except('logo', 'icon'));

        $setting->save();

        return back();
//        return redirect()->route('dashboard.home');
    }
}

