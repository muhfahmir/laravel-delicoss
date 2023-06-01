<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expedition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expeditions = Expedition::all();
        return view('pages.admin.expedition.index',[
            'expeditions'=>$expeditions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.expedition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            $expedition = new Expedition();
            $expedition->name = $request->name;
            $expedition->price = $request->price;
            $expedition->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.expedition.index')
                ->with('msg-success', 'Expedition berhasil ditambahkan!');
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
        $expedition = Expedition::find($id);
        return view('pages.admin.expedition.edit',['expedition'=>$expedition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
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
            $expedition = Expedition::find($id);
            $expedition->name = $request->name;
            $expedition->price = $request->price;
            $expedition->update();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.expedition.index')
                ->with('msg-success', 'Expedition berhasil diupdate!');
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
            $expedition = Expedition::find($id);
            $expedition->delete();
            return redirect()
                ->route('admin.expedition.index')
                ->with('msg-danger', 'Berhasil menghapus expedition!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
