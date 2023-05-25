<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create(array_merge(
            ['password' => Hash::make($request->password)],
            $request->only(['name', 'surname', 'patronymic', 'email', 'address', 'phone'])
        ));

        auth()->login($user);

        return to_route('index');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return to_route('index');
    }
    
    public function create() {
        return view('users.create');
    }

    public function login() {
        return view('users.login');
    }

    public function loginCheck(LoginRequest $request) {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return to_route('user.orders.index');
        }
        return back()->withErrors(['errorLogin' => 'Неверный логин или пароль']);
    }
}