@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/paintings/main.css') }}" />
@endpush

@section('content')

<div class="container">
    <div class="header p-3">
        <div class="row" id="header">
            <div class="col-3 d-none d-sm-none d-lg-block">
                <div class="d-flex flex-content-left">
                    <a class="btn__go-main d-flex flex-column align-items-end" href="{{ route('index') }}">
                        <p class="btn__go-main__tltle">НА ГЛАВНУЮ</p>
                        <img class="btn__go-main__image" src="{{ asset('images/arrow.svg') }}" alt="arrow" />
                    </a>
                </div>
            </div>
            <div class="col-9 d-flex flex-column">
                <h5 class="header__sub-title">
                    ДОБРО ПОЖАЛОВАТЬ В МАГАЗИН
                </h5>
                <h1 class="header__title">Живописи</h1>
            </div>
        </div>

        <div class="row header-sort mt-4">
            <div class="col-3 d-none d-sm-none d-lg-block">
                <div class="d-flex justify-content-between align-items-center gap-4 h-100">
                    <div class="header__sort-title">
                        ФИЛЬТРАЦИЯ
                    </div>
                    <div class="btn__sort-reset gap-2 d-flex align-items-center">
                        <p class="btn__sort-reset__title">СБРОСИТЬ ВСЕ</p>
                        <img src="{{ asset('images/cross.svg') }}" alt="reset" class="btn__sort-reset-icon d-block" />
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12 d-flex justify-content-between align-items-center gap-4">
                <div class="btn-filter d-lg-none">
                    <div class="btn-filter__title">Фильтры</div>
                    <img src="{{ asset('../../images/filter.svg') }}" alt="filter">
                </div>
                <div class="header-sort__container d-flex justify-content-end align-items-center gap-4 w-100">
                    <div class="header-sort__title d-none d-sm-none d-lg-block">СОРТИРОВАТЬ ПО</div>
                    <div class="header-sort__criterions d-flex gap-4">
                        <div class="header-sort__criterion d-flex align-items-center gap-3">
                            <label for="size" class="form-label d-none d-sm-none d-lg-block">РАЗМЕР</label>
                            <select class="form-select header-sort__select" id="size">
                                <option selected>По умолчанию</option>
                                <option value="1">По убыванию</option>
                                <option value="2">По возрастанию</option>
                            </select>
                        </div>
                        <div class="header-sort__criterion d-flex align-items-center gap-3">
                            <label for="artist" class="form-label d-none d-sm-none d-lg-block">ЦЕНА</label>
                            <select class="form-select header-sort__select">
                                <option selected>По умолчанию</option>
                                <option value="1">По убыванию</option>
                                <option value="2">По возрастанию</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="paintings">
        <div class="row filter">
            <div class="col-3 d-none d-sm-none d-lg-block">
                <div class="accordion filter-container" id="accordionPanelsStayOpen">
                    <div class="accordion-item filter-style">
                        <h2 class="accordion-header" id="style-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#style-collapseOne" aria-expanded="true"
                                aria-controls="style-collapseOne">
                                СТИЛЬ
                            </button>
                        </h2>
                        <div id="style-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="style-headingOne">
                            <div class="accordion-body filter-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Импрессионизм
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Авангардизм
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Кубизм
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item filter-plot">
                        <h2 class="accordion-header" id="plot-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#plot-collapseTwo" aria-expanded="false"
                                aria-controls="plot-collapseTwo">
                                СЮЖЕТ
                            </button>
                        </h2>
                        <div id="plot-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body filter-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Абстракции
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Пейзаж
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item filter-technique">
                        <h2 class="accordion-header" id="technique-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#technique-collapseThree" aria-expanded="false"
                                aria-controls="technique-collapseThree">
                                ТЕХНИКА
                            </button>
                        </h2>
                        <div id="technique-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="technique-headingThree">
                            <div class="accordion-body filter-cintainer">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Акрил
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Масло
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item filter-material">
                        <h2 class="accordion-header" id="material-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#material-collapseThree" aria-expanded="false"
                                aria-controls="material-collapseThree">
                                МАТЕРИАЛ
                            </button>
                        </h2>
                        <div id="material-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="material-headingThree">
                            <div class="accordion-body filter-cintainer">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Холст
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Бумага
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Картон
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div class="grid paintings-container" id="grid">
                    @foreach($paintings as $painting)
                    <div class="item painting-card">
                        <div class="item-content d-flex flex-column gap-1">
                            <img src="{{ asset('images/paintings/'. $painting->image) }}" alt="{{ $painting->title }}"
                                class="painting-img mb-2">
                            <div class="artist-name">{{ $painting->artist->name }} {{ $painting->artist->surname }}
                            </div>
                            <div class="painting-title">{{ $painting->title }}</div>
                            <div class="painting-description">
                                <div class="painting-size">{{ $painting->width }}' ш X {{ $painting->height }}'в</div>
                                <div class="painting-technique">Масло</div>
                            </div>

                            <div class="painting-price">{{ $painting->price }} Р</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@endsection()