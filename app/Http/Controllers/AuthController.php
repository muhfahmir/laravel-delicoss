<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function index()
    {
        return view('pages.auth.login');
    }
    public function check(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
        try {
            $input = $request->only('email', 'password');
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                return response()->json('Email dan Password tidak terdaftar', 401);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json('Password yang anda masukkan salah', 401);
            }

            Auth::attempt($input);
            // return ['url'=>'/dashboard','role'=>$dataRole];
            if ($user->user_role_id == 1) {
                return redirect()->route('admin.product_category.index');
            } else {
                return redirect()->route('user.product.index');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function create()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $rules = [
            'fullname' => 'required|string',
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
            $user->user_role_id = 2;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()
                ->route('sign-in')
                ->with('msg-success', 'User berhasil didaftarkan!');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
            //throw $th;
        }
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->flush();
        return redirect()->route('sign-in')->with('status-danger','Anda sudah berhasil Logout');
    }
}
