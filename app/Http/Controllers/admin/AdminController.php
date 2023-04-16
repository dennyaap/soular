<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login() {
        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        if (Auth::attempt($request->only(['login', 'password']))) {
            $request->session()->regenerate();

            return to_route('admin.orders.index');
        }
        return back()->withErrors(['errorLogin' => 'Неверный логин или пароль']);
    }
}