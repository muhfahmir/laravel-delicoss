<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderTypes = OrderType::all();
        return view('pages.admin.order_type.index',['orderTypes'=>$orderTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.order_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:order_types,name',
            'price'=> 'numeric'
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
            $orderType = new OrderType();
            $orderType->name = $request->name;
            $orderType->price = $request->price;
            $orderType->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.order_type.index')
                ->with('msg-success', 'Order Type berhasil ditambahkan!');
        } catch (\Exception $e) {
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
        $orderType = OrderType::find($id);
        return view('pages.admin.order_type.edit',['orderType'=>$orderType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|unique:expeditions,name',
            'price'=> 'numeric'
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
            $orderType = OrderType::find($id);
            $orderType->name = $request->name;
            $orderType->price = $request->price;
            $orderType->update();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.order_type.index')
                ->with('msg-success', 'Order Type berhasil diupdate!');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $orderType = OrderType::find($id);
            $orderType->delete();
            return redirect()
                ->route('admin.order_type.index')
                ->with('msg-danger', 'Berhasil menghapus Order Type!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
