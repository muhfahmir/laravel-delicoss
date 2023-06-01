<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRoles = UserRole::all();
        return view('pages.admin.user_role.index',['userRoles'=>$userRoles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user_role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string||unique:user_roles,name',
        ];

        try {
            // validasi input
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // jika validasi berhasil buat user role
            $userRole = new UserRole();
            $userRole->name = $request->name;
            $userRole->save();

            // setelah berhasil tambah data, move to index
            return redirect()
                ->route('admin.user_role.index')
                ->with('msg-success', 'User Role berhasil ditambahkan!');
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
        $userRole = UserRole::find($id);
        return view('pages.admin.user_role.edit',['userRole'=>$userRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|unique:user_roles,name,'.$id.',id',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $userRole = UserRole::find($id);
            $userRole->name = $request->name;
            $userRole->update();
            return redirect()
                ->route('admin.user_role.index')
                ->with('msg-success', 'User Role berhasil diupdate!');
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
            $userRole = UserRole::find($id);
            $userRole->delete();
            return redirect()
                ->route('admin.user_role.index')
                ->with('msg-danger', 'Berhasil menghapus User Role!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
