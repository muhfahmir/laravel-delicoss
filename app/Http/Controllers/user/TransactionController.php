<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\OrderType;
use App\Models\PaymentType;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $transactions = Transaction::with('cart', 'user', 'address', 'paymentType', 'orderType', 'cart.product', 'cart.product.productCategory')
            ->where('user_id', $userId)
            ->get();
        // return $transactions;
        // return $transactions;
        return view('pages.user.transaction.index', [
            'transactions' => $transactions,
            'user' => $user,
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
        // return $request;
        $userId = Auth::user()->id;
        $carts = Cart::with('product', 'user')
            ->where(['user_id' => $userId, 'status' => 'N'])
            ->get();
        $orderType = OrderType::find($request->order_type_id);
        $paymentTypes = PaymentType::all();
        // return $totalCarts;
        $address = Address::find($request->address_id);
        if ($request->payment_type_id == null) {
            // choose payment page
            return view('pages.user.transaction.create', [
                'carts' => $carts,
                'orderType' => $orderType,
                'paymentTypes' => $paymentTypes,
                'request' => $request,
            ]);
            // return 'true';
        } else {
            // return $request;
            // input data into transaction
            $rules = [
                'total_payment' => 'required|numeric',
                'order_type_id' => 'required|numeric',
                'address_id' => 'required|numeric',
                'payment_type_id' => 'required|numeric',
                'delivery_date' => 'required',
                'delivery_time' => 'required',
                'note' => 'required|string',
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
                foreach ($carts as $index => $cart) {
                    $transaction = new Transaction();
                    $transaction->user_id = $userId;
                    $transaction->cart_id = $cart->id;
                    $transaction->address_id = $request->address_id;
                    $transaction->payment_type_id = $request->payment_type_id;
                    $transaction->order_type_id = $request->order_type_id;
                    $transaction->delivery_date = $request->delivery_date;
                    $transaction->delivery_time = $request->delivery_time;
                    $transaction->note = $request->note;
                    $transaction->total_payment = $request->total_payment;
                    $transaction->status_payment = 'P';
                    $transaction->proof_payment = '';
                    // cart id butuh loop
                    $transaction->save();

                    $cartUpdate = Cart::find($cart->id);
                    $cartUpdate->status = 'Y';
                    $cartUpdate->update();
                }

                // setelah berhasil tambah data, move to index
                return redirect()
                    ->route('user.transaction.index')
                    ->with('msg-success', 'Transaction berhasil dilakukan!');
            } catch (\Exception $e) {
                return response()->json($e->getMessage());
            }
            // return 'false';
        }
    }

    public function uploadImage(Request $request)
    {
        // return $request;
        try{
            $transaction = Transaction::find($request->id);
            // return $transaction;
            // if ($transaction->proof_payment != null) {
            //     $imageOld = $transaction->proof_payment;
            //     delete_img('transaction', $imageOld);
            // }
            // create
            $originalImage = $request->file('image_url');
            $nameImage = uniqid() . Str::slug($request->id) . '.jpg';
            create_image($originalImage, 'transaction', $nameImage);
            $transaction->proof_payment = $nameImage;
            $transaction->update();

            return redirect()->route('user.transaction.index');
        }catch (\Exception $e) {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
