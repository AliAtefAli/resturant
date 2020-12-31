<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImages;
use App\Traits\Uploadable;

class ProductController extends Controller
{
    use Uploadable;
    public function index()
    {
        $products = Product::with('translation')
            ->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $images = $request['images'];

        foreach ($images as $image_input) {
            $path = $this->uploadOne($image_input, '736', '1000', 'products');

            $image = new Image(['path' => $path]);
            $product->images()->save($image);
        }


        return redirect()->route('dashboard.home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('images'));

        if ($request->has('images')) {
            $images = $request['images'];

            $old_images = Image::where('imageable_id', $product->id)->get();
            // Delete from the asset
            foreach ($old_images as $old_image) {
                if (file_exists(public_path('assets/images/products/' . $old_image->path))) {
                    unlink(public_path('assets/images/products/' . $old_image->path));
                }
                // Delete from database
                $old_image->delete();
            }
            // Put the new images
            foreach ($images as $image_input) {
                $path = $this->uploadOne($image_input, null, null, 'products');

                $image = new Image(['path' => $path]);
                $product->images()->save($image);
            }
        }

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.home');
    }
}
