<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $carts = Cart::with('product', 'user')->where(['user_id'=>$userId,'status'=>'N'])->get();
        $orderTypes = OrderType::all();
        $addresses = Address::where('user_id',$userId)->get();
        // return response()->json(['carts'=>$carts]);
        return view('pages.user.cart.index', [
            'carts' => $carts, 
            'orderTypes' => $orderTypes,
            'addresses'=>$addresses
        ]);
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
        $rules = [
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'qty' => 'required|numeric',
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
            $cart = Cart::where([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                'status'=>'N'
            ])->get();
            if(!$cart->isEmpty()){
                $cart= $cart[0];
                $cart->qty = $cart->qty + $request->qty;
                $cart->update();
            }else{
                $cart = new Cart();
                $cart->product_id = $request->product_id;
                $cart->user_id = $request->user_id;
                $cart->qty = $request->qty;
                $cart->save();
            }
            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('user.cart.index')
                ->with('msg-success', 'Product berhasil ditambahkan ke dalam Cart!');
        } catch (\Exception $e) {
            return $e->getMessage();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // return $request;
        $rules = [
            'qty' => 'required|numeric',
            'cart_id' => 'required|numeric',
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
            $cart = Cart::find($request->cart_id);
            $cart->qty = $request->qty;
            $cart->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('user.cart.index')
                ->with('msg-success', 'Product berhasil diupdate di dalam Cart!');
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
            $cart = Cart::find($id);
            $cart->delete();
            return redirect()
                ->route('user.cart.index')
                ->with('msg-danger', 'Berhasil menghapus Product dalam Cart!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
