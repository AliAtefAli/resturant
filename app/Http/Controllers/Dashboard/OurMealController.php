<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OurMeals;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurMealController extends Controller
{
    use Uploadable;

    public function index()
    {
        $our_meals = OurMeals::paginate();

        return view('dashboard.our_meals.index', compact('our_meals'));
    }

    public function create()
    {

        return view('dashboard.our_meals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image'
        ], [
            'name.required' => (trans('validation.field_required_name')),
            'image.required' => (trans('validation.field_required_image')),
            'image.image' => (trans('validation.field_image')),
        ]);

        $image = $request['image'];

        $path = $this->uploadOne($image, 'meals', 280, 280);

        OurMeals::create([
            'name' => $request->name,
            'image' => $path
        ]);

        return redirect()->route('dashboard.meals.index')->with('success', trans('dashboard.created_successfully'));
    }


    public function show(OurMeals $meals)
    {
        return view('dashboard.our_meals.show', compact('meals'));
    }

    public function edit(OurMeals $meals)
    {
        return view('dashboard.our_meals.edit', compact('meals'));
    }


    public function update(Request $request, OurMeals $meals)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ], [
            'name.required' => (trans('validation.field_required_name')),
            'image.image' => (trans('validation.field_image')),
        ]);

        if ($request->has('image')) {
            if (file_exists(asset('assets/uploads/meals/' . $meals->image))) {
                unlink(asset('assets/uploads/meals/' . $meals->image));
            }
            $image = $request['image'];
            $path = $this->uploadOne($image, 'meals', 280, 280);
        }

        $meals->update([
            'name' => $request->name,
            'image' => $path
        ]);

        return redirect()->route('dashboard.meals.index')->with('success', trans('dashboard.Updated successfully!'));

    }


    public function destroy(OurMeals $meals)
    {
        if ($meals->image != null)
        {
            @unlink(asset('assets/uploads/meals/'. $meals->image));
        }
        $meals->delete();

        return redirect()->route('dashboard.meals.index')->with("success", trans('dashboard.deleted_successfully'));
    }
}
