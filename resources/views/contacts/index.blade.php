@extends('templates.app')

@section('title', 'Контакты')

@push('style')
<link rel="stylesheet" href="{{ asset('css/main/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/arts/arts.css') }}" />
<link rel="stylesheet" href="{{ asset('css/contacts/main.css') }}">
@endpush

@section('content')
<div class="container contacts">
    <div class="section__container">
        <div class="section__content">
            <div class="section__description">
                <div class="section__line"></div>
                <h5 class="section__description-sub__title">КОНТАКТЫ</h5>
                <h1 class="section__description-title header__title">Будем рады ответить на ваши вопросы</h1>
            </div>
        </div>
    </div>

    <div class="contacts-information">
        <div class="row row-cols-1 row-cols-md-3 g-5">
            <div class="col">
                <div class="contacts-content d-flex flex-column gap-4">
                    <h3 class="contacts-title">Email</h3>
                    <div class="section__line"></div>

                    <div class="contacts-label">
                        <p class="contacts-text">ОБЩИЕ ВОПРОСЫ ИЛИ ВЫ ХУДОЖНИК</p>
                        <p class="contacts-email">info@soulart.com</p>
                    </div>
                    <div class="contacts-label">
                        <p class="contacts-text">УЗНАТЬ БОЛЬШЕ О КОНКРЕТНОМ ПРОИЗВЕДЕНИИ</p>
                        <p class="contacts-email">painting@soulart.com</p>
                    </div>
                    <div class="contacts-label">
                        <p class="contacts-text">ВОПРОСЫ ПО ДОСТАВКЕ</p>
                        <p class="contacts-email">shipping@soulart.com</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('images/contacts/painting.jpg') }}" class="w-100" alt="painting">
            </div>
            <div class="col">
                <div class="contacts-content d-flex flex-column gap-4">
                    <h3 class="contacts-title">Адрес</h3>
                    <div class="section__line"></div>

                    <div class="contacts-label">
                        <p class="contacts-text">Челябинск, Цвиллинга 25, ТРК КУБа, 2 этаж, Галерея Soul Art</p>
                        <p class="contacts-email">8 (351) 777-02-74</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25462.05240521614!2d61.414270428607374!3d55.15603080326408!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5ed4bdb4750e7%3A0xc960c4c3c7b626fc!2z0JrRg9Cx0LA!5e0!3m2!1sru!2sru!4v1685367233254!5m2!1sru!2sru"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" class="map"></iframe> -->
</div>
@endsection