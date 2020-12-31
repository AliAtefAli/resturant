<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Store;
use App\Traits\Uploadable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Uploadable;

    public function index()
    {
        $categories = Category::with('translation')
            ->paginate();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return back()->with('success', trans('dashboard.It was done successfully!'));
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            if (file_exists(asset('assets/uploads/categories/' . $category->image))) {
                unlink(asset('assets/uploads/categories/' . $category->image));
            }
            $path = $this->uploadOne($request['image'], 'categories', null, null);
            $data['image'] = $path;
        }

        $category->update($data);

        return redirect()->route('dashboard.categories.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(Category $category)
    {

        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
