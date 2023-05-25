@extends('templates.app')

@section('title', 'Регистрация')

@push('style')
<link rel="stylesheet" href="{{ asset('css/registration/main.css') }}" />
@endpush

@section('content')
<div id="header">

</div>
<section class="register">
    <div class="container register-container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="h1 mb-5 mx-1 mx-md-4 mt-4 register-title">Регистрация</p>

                                <form class="mx-1 mx-md-4" method="POST">
                                    @CSRF

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>

                                            <label class="form-label" for="name">Имя</label>

                                            <input type="text" id="name"
                                                class="form-control @error('name') in-invalid @enderror" name="name"
                                                value="{{ old('name') }}" />

                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="surname">Фамилия</label>

                                            <input type="text" id="surname"
                                                class="form-control @error('surname') in-invalid @enderror"
                                                name="surname" value="{{ old('surname') }}" />

                                            @error('surname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="patronymic">Отчество</label>

                                            <input type="text" id="patronymic"
                                                class="form-control @error('patronymic') in-invalid @enderror"
                                                name="patronymic" value="{{ old('patronymic') }}" />

                                            @error('patronymic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


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
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="phone">Телефон</label>

                                            <input type="text" id="phone"
                                                class="form-control @error('phone') in-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" placeholder="+79904343423" />

                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="email">Адрес</label>

                                            <input type="text" id="address"
                                                class="form-control @error('address') in-invalid @enderror"
                                                name="address" value="{{ old('address') }}" />

                                            @error('address')
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
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="emailHelp" class="form-text">Не менее 8 символов.</div>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <label class="form-label" for="password_confirmation">Подтверждение
                                                пароля</label>

                                            <input type="password" id="password"
                                                class="form-control @error('password_confirmation') in-invalid @enderror"
                                                name="password_confirmation" />

                                        </div>
                                    </div>


                                    <div
                                        class="d-flex justify-content-center align-items-center gap-5 mx-4 mb-3 mb-lg-4">
                                        <button type="submit"
                                            class="btn btn-lg btn-register">Зарегистрироваться</button>
                                        <a href="{{ route('user.login') }}">Войти</a>

                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

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