<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductTranslation;
use App\Traits\Uploadable;

class ProductController extends Controller
{
    use Uploadable;

    public function index()
    {
        $products = Product::with('translation')
            ->latest()
            ->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {

        $product = Product::create($request->validated());

        $images = $request['image'];
        foreach ($images as $image) {
            $path = $this->uploadOne($image, 'products', null, null);

            Image::create([
                'path' => $path,
                'product_id' => $product->id
            ]);
        }
        return redirect()->route('dashboard.products.index')->with('success', trans('dashboard.created_successfully'));
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $image_count = $product->images->count();
        return view('dashboard.products.edit', compact('product', 'categories', 'image_count'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
         $product->update($request->except('images'));

        if ($request->has('image')) {

            $old_images = Image::where('product_id', $product->id)->get();

            foreach ($old_images as $old_image) {
                if (file_exists(public_path('assets/products/' . $old_image->path)) && is_file(public_path('assets/products/' . $old_image->path))) {
                    unlink(public_path('assets/products/' . $old_image->path));
                }
                $old_image->delete();
            }
            $images = $request['image'];

            foreach ($images as $image) {
                $path = $this->uploadOne($image, 'products', null, null);

                Image::create([
                    'path' => $path,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect()->route('dashboard.products.index')->with('success', trans('dashboard.Updated successfully!'));

    }

    public function destroy(Product $product)
    {
        $old_images = Image::where('product_id', $product->id)->get();

        foreach ($old_images as $old_image) {
            if (file_exists(public_path('assets/uploads/products/' . $old_image->path)) && is_file(public_path('assets/uploads/products/' . $old_image->path))) {
                unlink(public_path('assets/uploads/products/' . $old_image->path));
            }
            $old_image->delete();
        }

        $product_translations = ProductTranslation::where('product_id', $product->id)->get();
        if (!empty($product_translations)) {
            foreach ($product_translations as $product_translation) {
                $product_translation->delete();
            }
        }

        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', trans('dashboard.deleted_successfully'));
    }

    public function featured(Product $product)
    {
        $product->update(['featured' => true]);

        return redirect()->route('dashboard.products.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function unFeatured(Product $product)
    {
        $product->update(['featured' => false]);

        return redirect()->route('dashboard.products.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
