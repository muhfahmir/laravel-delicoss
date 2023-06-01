<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();

        return view('pages.admin.product_category.index')->with([
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:product_categories,name',
        ];

        try {
            // validasi input
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // jika validasi berhasil buat product category
            $productCategory = new ProductCategory();
            $productCategory->name = $request->name;
            $productCategory->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.product_category.index')
                ->with('msg-success', 'Product Category berhasil ditambahkan!');
        } catch (Exception $e) {
            return response()->json($e->getMessage());
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
        $productCategory = ProductCategory::find($id);
        return view('pages.admin.product_category.edit', ['productCategory' => $productCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|unique:product_categories,name,'.$id.',id',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $productCategory = ProductCategory::find($id);
            $productCategory->name = $request->name;
            $productCategory->update();
            return redirect()
                ->route('admin.product_category.index')
                ->with('msg-success', 'Product Category berhasil diupdate!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productCategory = ProductCategory::find($id);
            $productCategory->delete();
            return redirect()
                ->route('admin.product_category.index')
                ->with('msg-danger', 'Berhasil menghapus Product Category!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
