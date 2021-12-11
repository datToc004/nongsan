<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function postLogin(request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect("admin");
        }

        return redirect("login")->withInput()->with('thongBao', 'Tài khoản khoặc mật khẩu không chính xác!');
    }

    public function postLoginCustomer(request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('shop');
        }

        return redirect()->route('customer.login')->withInput()->with('thongBao', 'Tài khoản khoặc mật khẩu không chính xác!');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect('login');
    }

    public function logoutCustomer()
    {
        Auth::logout();

        return redirect()->route('customer.login');
    }
}
