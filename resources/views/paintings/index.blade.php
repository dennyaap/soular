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
                    <div class="btn__sort-reset gap-2 d-flex align-items-center" id="btnResetFilters">
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
                            <select class="form-select header-sort__select" id="sortBySelect">
                                <option value="price" selected>Цена</option>
                                <option value="width">Размер</option>
                            </select>
                        </div>
                        <div class="header-sort__criterion d-flex align-items-center gap-3">
                            <select class="form-select header-sort__select" id="sortTypeSelect">
                                <option value="asc" selected>По возрастанию</option>
                                <option value="desc">По убыванию</option>
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
                                @foreach($styles as $style)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $style->id }}"
                                        id="{{ $style->name }}" name="style">
                                    <label class="form-check-label" for="{{ $style->name }}">
                                        {{ $style->name }}
                                    </label>
                                </div>
                                @endforeach
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
                                @foreach($plots as $plot)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $plot->id }}"
                                        id="{{ $plot->name }}" name="plot">
                                    <label class="form-check-label" for="{{ $plot->name }}">
                                        {{ $plot->name }}
                                    </label>
                                </div>
                                @endforeach
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
                                @foreach($techniques as $technique)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $technique->id }}"
                                        id="{{ $technique->name }}" name="technique">
                                    <label class="form-check-label" for="{{ $technique->name }}">
                                        {{ $technique->name }}
                                    </label>
                                </div>
                                @endforeach
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
                                @foreach($materials as $material)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $material->id }}"
                                        id="{{ $material->name }}" name="material">
                                    <label class="form-check-label" for="{{ $material->name }}">
                                        {{ $material->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div class="paintings-container" id="painting-container">
                    <div class="grid">

                    </div>
                    <!-- <div class="grid"> -->
                    <!-- @foreach($paintings as $painting)
                        <div class="grid-item painting-card" data-size="{{ $painting->width + $painting->height }}"
                            data-price="{{ $painting->price }}">
                            <div class="item-content d-flex flex-column gap-1">
                                <img src="{{ asset('images/paintings/'. $painting->image) }}"
                                    alt="{{ $painting->title }}" class="painting-img mb-2">
                                <div class="artist-name">{{ $painting->artist->name }} {{ $painting->artist->surname }}
                                </div>
                                <div class="painting-title">{{ $painting->title }}</div>
                                <div class="painting-description">
                                    <div class="painting-size">{{ $painting->width }}' ш X {{ $painting->height }}'в
                                    </div>
                                    <div class="painting-technique">Масло</div>
                                </div>

                                <div class="painting-price">{{ $painting->price }} Р</div>
                            </div>
                        </div>
                        @endforeach -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection()

@push('script')
<script src="{{ asset('js/fetch.js') }}"></script>
<script src="{{ asset('js/product.js') }}"></script>
<script src="{{ asset('js/products/createCards.js') }}"></script>
<script src="{{ asset('js/products/filter.js') }}"></script>
<script>
let products = [];

function hideCards(cards) {
    grid.hide(cards);
}

function showCards(products) {
    createCards(products).then((data) => {
        const newItems = grid.add(data, {
            active: false
        });
        grid.show(newItems);
    });
}



(async () => {
    products = await getAllProducts(`{{ csrf_token() }}`, {
        sortBy,
        typeSort,
        stylesId,
        plotsId,
        techniquesId,
        materialsId
    });

    showCards(products);
})();

sortBySelectElement.addEventListener("change", async (e) => {
    sortBy = e.target.value;
    products = await getAllProducts(`{{ csrf_token() }}`, {
        sortBy,
        typeSort,
        stylesId,
        plotsId,
        techniquesId,
        materialsId,
    });

    hideCards(grid.getItems());
    showCards(products);
});

sortTypeSelectElement.addEventListener("change", async (e) => {
    typeSort = e.target.value;
    products = await getAllProducts(`{{ csrf_token() }}`, {
        sortBy,
        typeSort,
        stylesId,
        plotsId,
        techniquesId,
        materialsId,
    });

    hideCards(grid.getItems());
    showCards(products);
});

styleCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", async () => {
        let checkedCheckboxes = document.querySelectorAll(
            "input[type=checkbox][name=style]:checked"
        );

        stylesId = [...checkedCheckboxes].map((item) => item.value);

        products = await getAllProducts(`{{ csrf_token() }}`, {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
        });

        hideCards(grid.getItems());
        showCards(products);
    });
});

plotCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", async () => {
        let checkedCheckboxes = document.querySelectorAll(
            "input[type=checkbox][name=plot]:checked"
        );

        plotsId = [...checkedCheckboxes].map((item) => item.value);

        products = await getAllProducts(`{{ csrf_token() }}`, {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
        });

        hideCards(grid.getItems());
        showCards(products);
    });
});

techniqueCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", async () => {
        let checkedCheckboxes = document.querySelectorAll(
            "input[type=checkbox][name=technique]:checked"
        );

        techniquesId = [...checkedCheckboxes].map((item) => item.value);

        products = await getAllProducts(`{{ csrf_token() }}`, {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
        });

        hideCards(grid.getItems());
        showCards(products);
    });
});

materialCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", async () => {
        let checkedCheckboxes = document.querySelectorAll(
            "input[type=checkbox][name=material]:checked"
        );

        materialsId = [...checkedCheckboxes].map((item) => item.value);

        products = await getAllProducts(`{{ csrf_token() }}`, {
            sortBy,
            typeSort,
        });

        hideCards(grid.getItems());
        showCards(products);
    });
});

async function resetFilters() {
    sortBy = "price";
    typeSort = "asc";
    stylesId = [];
    plotsId = [];
    techniquesId = [];
    materialsId = [];

    products = await getAllProducts(`{{ csrf_token() }}`, {
        sortBy,
        typeSort,
    });

    hideCards(grid.getItems());
    showCards(products);

    const checkedCheckboxes = document.querySelectorAll(
        "input[type=checkbox]:checked"
    );

    sortBySelectElement.value = sortBy;
    sortTypeSelectElement.value = typeSort;

    checkedCheckboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });
}
</script>
@endpush