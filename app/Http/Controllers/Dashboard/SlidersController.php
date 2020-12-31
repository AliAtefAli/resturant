<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditSliderRequest;
use App\Http\Requests\StoreSliderRequest;
use App\Models\Slider;
use App\Models\SliderTranslation;
use App\Traits\Uploadable;

class SlidersController extends Controller
{
    use Uploadable;

    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->paginate(10);

        return view('dashboard.sliders.index', compact('sliders'));
    }


    public function create()
    {
        return view('dashboard.sliders.create');

    }

    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->uploadOne($data['image'], 'sliders', null, null);

        Slider::create($data);

        return redirect()->route('sliders.index')->with("success", trans('dashboard.slider.created successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }


    public function update(EditSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        if ($request->hasFile("image")) {
            if (file_exists(public_path('assets/dashboard/sliders/' . $slider->image))) {
                unlink(public_path('assets/dashboard/sliders/' . $slider->image));
            }
            $data['image'] = $this->uploadOne($data['image'], 'sliders', null, null);
        }
        $slider->update($data);

        return redirect()->route('sliders.index')->with("success", trans('dashboard.slider.updated successfully'));
    }


    public function destroy(Slider $slider)
    {
        $slider_translations = SliderTranslation::where('slider_id', $slider->id)->get();
        if (!empty($slider_translations)) {
            foreach ($slider_translations as $slider_translation) {
                $slider_translation->delete();
            }
        }
        $slider->delete();
        return redirect()->back();

    }
}
