<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditSliderRequest;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
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

        return redirect()->route('dashboard.sliders.index')->with("success", trans('dashboard.slider.created successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }


    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        if ($request->hasFile("image")) {
            if (file_exists(public_path('assets/uploads/sliders/' . $slider->image))) {
                unlink(public_path('assets/uploads/sliders/' . $slider->image));
            }
            $data['image'] = $this->uploadOne($data['image'], 'sliders', null, null);
        }
        $slider->update($data);

        return redirect()->route('dashboard.sliders.index')->with("success", trans('dashboard.slider.updated successfully'));
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('dashboard.sliders.index')->with("success", trans('dashboard.slider.updated successfully'));
    }
    public function makeAsPending(Slider $slider)
    {
        $slider->update(['status' => 'pending'] );

        return redirect()->route('dashboard.sliders.index')->with("success", trans('dashboard.slider.updated successfully'));
    }
    public function makeAsActive(Slider $slider)
    {
        $slider->update(['status' => 'active'] );

        return redirect()->route('dashboard.sliders.index')->with("success", trans('dashboard.slider.updated successfully'));
    }
}
