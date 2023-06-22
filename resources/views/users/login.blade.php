@extends('templates.app')

@section('title', 'Авторизация')

@push('style')
<link rel="stylesheet" href="{{ asset('css/login/main.css') }}" />
@endpush

@section('content')
<div id="header">

</div>
<section class="login">
    <div class="container login-container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="h1 mb-5 mx-1 mx-md-4 mt-4 login-title">Войти</p>

                                <form class="mx-1 mx-md-4" method="POST" action="{{ route('user.login.check') }}">
                                    @CSRF

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="email">email</label>

                                            <input type="email" id="email"
                                                class="form-control @error('email') in-invalid @enderror" name="email"
                                                value="{{ old('email') }}" />

                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="password">Пароль</label>

                                            <input type="password" id="password"
                                                class="form-control @error('password') in-invalid @enderror"
                                                name="password" />
                                            @error('errorLogin')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div
                                        class="d-flex justify-content-center align-items-center gap-5 mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-lg btn-login">Войти</button>
                                        <a href="{{ route('user.store') }}">Регистрация</a>
                                    </div>

                                </form>

                            </div>
                            <div
                                class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 d-none d-md-none d-lg-block">

                                <img src="{{ asset('images/paintings/p6.jpg') }}" class="img-fluid w-100 painting-img"
                                    alt="painting">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection