<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use App\Models\Order;
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
        //1. создать пользоватя
        //2. войти
        //3. перейти на личную страницу
        $user = User::create(array_merge(
            ['password' => Hash::make($request->password)],
            $request->only(['name', 'surname', 'patronomyc', 'email', 'address'])
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

    public function orders() {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('users.orders.index', compact('orders'));
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