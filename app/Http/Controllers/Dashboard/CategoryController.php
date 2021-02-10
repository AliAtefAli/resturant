<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\CategoryTranslation;

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
        $categories = Category::whereCategoryId(null)->get();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('dashboard.categories.index')->with('success', trans('dashboard.created_successfully'));
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        $categories = Category::whereCategoryId(null)->where('id','!=',$category->id)->get();

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

        return redirect()->route('dashboard.categories.index')->with('success', trans('dashboard.Updated successfully!'));

    }


    public function destroy(Category $category)
    {
        if ($category->categories->count() > 0  || $category->products->count() > 0) {
            return redirect()->route('dashboard.categories.index')->with('error', trans('dashboard.category.Sorry this Category has sub categories'));
        }

        $category_translations = CategoryTranslation::where('category_id' ,$category->id)->get();
        if (!empty($category_translations)){
            foreach ($category_translations as $category_translation){
                $category_translation->delete();
            }
        }

        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', trans('dashboard.deleted_successfully'));
    }
}
