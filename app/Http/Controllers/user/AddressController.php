<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "good";
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
        $rules = [
            'recipient' => 'required|string',
            'phone_number' => 'required|numeric',
            'title' => 'required|string',
            'detail' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|numeric',
        ];

        try {
            // validasi input
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $userId = Auth::user()->id;
            // jika validasi berhasil buat product category
            $address = new Address();
            $address->user_id = $userId;
            $address->recipient = $request->recipient;
            $address->title = $request->title;
            $address->phone_number = $request->phone_number;
            $address->detail = $request->detail;
            $address->district = $request->district;
            $address->city = $request->city;
            $address->postal_code = $request->postal_code;
            $address->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('user.address.index')
                ->with('msg-success', 'Address berhasil ditambahkan!');
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
