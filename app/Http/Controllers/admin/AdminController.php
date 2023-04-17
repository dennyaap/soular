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
        if (auth('admin')->attempt($request->only(['login', 'password']))) {
            $request->session()->regenerate();

            return to_route('admin.orders.index');
        }
        return back()->withErrors(['errorLogin' => 'Неверный логин или пароль']);
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return to_route('index');
    }
}