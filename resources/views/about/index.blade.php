@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/about/about.css') }}" />
<link rel="stylesheet" href="{{ asset('css/about/main.css') }}" />


@endpush

@section('content')
<div class="container">
    <div id="header"></div>
    <section class="about">
        <div class="about__container">
            <div class="about__content">
                <div class="about__picture element-animation" id="about__picture-1"></div>

                <div class="about__picture element-animation" id="about__picture-2"></div>

                <h1 class="section__title">
                    <span class="bold-font">БУДЬ АУНТЕНТИЧНЫМ</span>, покупая оригинальное!
                    <br>
                    <span class="bold-font">УНИКАЛЬНЫЕ ПРОИЗВЕДЕНИЯ ОТ НАЧИНАЮЩИХ<br>& </span>
                    признанных художников!
                </h1>
                <div class="section__description">
                    <div class="section__line"></div>
                    <h5 class="section__description-sub__title">ВЫ НАХОДИТЕСЬ В</h5>
                    <h1 class="section_description-title">Правильном месте</h1>
                    <p class="about__description-information">
                        Наша галерея предоставляет широкий спектр удивительных предложений по разным ценам, чтобы
                        удовлетворить любой бюджет и вкус коллекционера. Все наши произведения являются оригинальными и
                        могут быть отправлены вам в течении нескольких дней после оплаты.
                    </p>
                    <p class="about__description-information">
                        Мы являемся галереей современного искусства, в которой представлены востребованные и уникальные
                        произведения, которые станут отличным дополнением вашего дома или офиса, представляя одних из
                        лучших начинающих художников, а также признанных на национальном уровне художников. Наши
                        произведения соответствуют современным тенденциям искусства
                    </p>
                </div>
                <div class="about__footer">
                    <a href="{{ route('paintings.index') }}">
                        <button class="btn-more">Перейти к работам</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('script')
<script src="{{ asset('js/animation.js') }}"></script>
@endpush