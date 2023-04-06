@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/paintings/card.css') }}" />
<link rel="stylesheet" href="{{ asset('css/painting/main.css') }}" />
@endpush

@section('content')

<section class="d-flex justify-content-center">
    <div class="container painting-container">
        <div id="header"></div>
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0"
                    src="{{ asset('images/paintings/'. $painting->image) }}" alt="{{ $painting->title }}" />
            </div>
            <div class="col-md-8">
                <div class="artist">{{ $painting->artist->name }} {{ $painting->artist->surname}}
                </div>
                <div class="title">{{ $painting->title }}</div>
                <div class="fs-5 mb-3">
                    <!-- <span class="text-decoration-line-through">$45.00</span> -->
                    <span class="price">{{ $painting->price }} Р</span>
                </div>
                <button class="btn btn__add-basket mt-2" type="button">
                    Добавить в корзину
                </button>
                <p class="lead mt-4">{{ $painting->description }}</p>

            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="paintings-container" id="painting-container">
            <h2 class="mb-4 paintings-title">Другие работы художника</h2>
            <div class="grid">
                @foreach($otherPaintings as $painting)
                <div class="item painting-card">
                    <div class="item-content d-flex flex-column gap-1"><img class="painting-img mb-2"
                            src="{{ asset('images/paintings/'. $painting->image) }}">
                        <div class="painting-artist">{{ $painting->artist->surname}} {{ $painting->artist->name }}</div>
                        <div class="painting-title">{{ $painting->title }}</div>
                        <div class="painting-description">
                            <div class="painting-size">{{ $painting->width }}' ш X {{ $painting->height}}' в</div>
                            <div class="painting-technique">{{ $painting->technique->name}}</div>
                            <div class="painting-price">{{ $painting->price }} Р</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection