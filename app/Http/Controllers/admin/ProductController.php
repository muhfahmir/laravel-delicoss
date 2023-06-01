<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productCategory')->get();
        // return $products;
        return view('pages.admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('pages.admin.product.create', ['productCategories' => $productCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'product_category_id' => 'required|numeric',
            'image_url' => 'file|mimes:jpeg,png,jpg',
            'price' => 'required|numeric',
            'size' => 'required|string',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $product = new Product();
            $product->name = $request->name;
            $product->product_category_id = $request->product_category_id;
            $product->price = $request->price;
            $product->size = $request->size;

            if ($request->file('image_url')) {
                $originalImage = $request->file('image_url');
                $nameImage = uniqid() . Str::slug($request->name) . '.jpg';
                create_image($originalImage, 'product', $nameImage);
                $product->image_url = $nameImage;
            }

            $product->save();

            return redirect()
                ->route('admin.product.index')
                ->with('msg-success', 'Product berhasil ditambahkan!');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('productCategory')
            ->where(['id' => $id])
            ->first();
        $productCategories = ProductCategory::all();
        return view('pages.admin.product.edit', [
            'product' => $product,
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string',
            'product_category_id' => 'required|numeric',
            'image_url' => 'file|mimes:jpeg,png,jpg',
            'price' => 'required|numeric',
            'size' => 'required|string',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $product = Product::find($id);

            if ($request->file('image_url') != null) {
                // delete
                $imageOld = $product->image_url;
               delete_img('product',$imageOld);

                // create
                $originalImage = $request->file('image_url');
                $nameImage = uniqid().Str::slug($request->name).'.jpg';
                create_image($originalImage,'product',$nameImage);
                $product->image_url = $nameImage;
            }
            $product->product_category_id = $request->product_category_id;
            $product->name = $request->name;
            $product->size = $request->size;
            $product->price = $request->price;
            $product->update();
            return redirect()
                ->route('admin.product.index')
                ->with('msg-success', 'Product berhasil diupdate!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            delete_img('product',$product->image_url);
            $product->delete();
            return redirect()
                ->route('admin.product.index')
                ->with('msg-danger', 'Berhasil menghapus Product!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
