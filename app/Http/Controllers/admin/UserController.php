<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('userRole')->get();
        return view('pages.admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userRoles = UserRole::all();
        return view('pages.admin.user.create', ['userRoles' => $userRoles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'fullname' => 'required|string',
            'user_role_id' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'numeric',
            'password' => 'required',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = new User();
            $user->user_role_id = $request->user_role_id;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()
                ->route('admin.user.index')
                ->with('msg-success', 'User berhasil ditambahkan!');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
            //throw $th;
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
        $user = User::find($id);
        $userRoles = UserRole::all();
        return view('pages.admin.user.edit', ['user' => $user, 'userRoles' => $userRoles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'fullname' => 'required|string',
            'user_role_id' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'phone_number' => 'numeric',
            'password' => '',
        ];

        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::find($id);
            $user->user_role_id = $request->user_role_id;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = $request->password || $user->password;
            $user->phone_number = $request->phone_number;
            $user->update();

            return redirect()
                ->route('admin.user.index')
                ->with('msg-success', 'User berhasil diupdate!');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
            //throw $th;
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()
                ->route('admin.user.index')
                ->with('msg-danger', 'Berhasil menghapus User!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
