<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('pages.admin.payment_type.index',['paymentTypes'=>$paymentTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.payment_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:payment_types,name',
            'account'=> 'numeric'
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
            $paymentType = new PaymentType();
            $paymentType->name = $request->name;
            $paymentType->account = $request->account;
            $paymentType->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.payment_type.index')
                ->with('msg-success', 'Payment Type berhasil ditambahkan!');
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
        $paymentType = PaymentType::find($id);
        return view('pages.admin.payment_type.edit',['paymentType'=>$paymentType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|unique:payment_types,name',
            'account'=> 'string'
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
            $paymentType = PaymentType::find($id);
            $paymentType->name = $request->name;
            $paymentType->account = $request->account;
            $paymentType->update();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.payment_type.index')
                ->with('msg-success', 'Payment Type berhasil diupdate!');
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
            $paymentType = PaymentType::find($id);
            $paymentType->delete();
            return redirect()
                ->route('admin.payment_type.index')
                ->with('msg-danger', 'Berhasil menghapus Payment Type!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
