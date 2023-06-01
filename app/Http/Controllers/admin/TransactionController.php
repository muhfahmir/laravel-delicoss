<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('cart', 'user', 'address', 'paymentType', 'orderType', 'cart.product', 'cart.product.productCategory')->get();

        return view('pages.admin.transaction.index', ['transactions' => $transactions]);
    }

    public function updateStatus($id, $status)
    {
        $transaction = Transaction::find($id);
        $transaction->status_payment = $status;
        $transaction->update();
      
        return redirect()->route('admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $transaction = Transaction::find($id);
        $transaction->status_payment = $request->status_payment;
        $transaction->update();
        return view('pages.admin.transaction.index')->with('msg-success', 'Berhasil mengubah status transaction!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
