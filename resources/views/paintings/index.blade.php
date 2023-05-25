@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/paintings/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/paintings/card.css') }}" />
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
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
                <div class="search-container mb-3">
                    <div class="search-container">
                        <div class="search-box">
                            <input type="text" id="input-box" placeholder="Поиск художника.." autocomplete="off">
                            <button><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="result-box">
                            <ul id="result-box">

                            </ul>
                        </div>
                    </div>
                </div>
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
                                        id="{{ $plot->name }}" name="plot"
                                        {{ $plot->id == ($_GET['plot_id'] ?? '') ? 'checked' : ''}}>
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
                </div>
                <div class="paintings-pagination d-flex justify-content-center mt-4">
                    <div class="pagination-container d-flex justify-content-between align-items-center gap-1">
                        <div class="page-btn page-btn__prev" id="page-btn__prev">
                            <a class="page-link" href="#"><img src="{{ asset('images/pagination/arrow.svg') }}"
                                    alt="btn-prev"></a>
                        </div>
                        <div class="pagination d-flex align-items-center gap-1" id="pagination">

                        </div>
                        <div class="page-btn page-btn__next" id="page-btn__next">
                            <a class="page-link" href="#"><img src="{{ asset('images/pagination/arrow.svg') }}"
                                    alt="btn-next"></a>
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
    <script src="{{ asset('js/artist.js') }}"></script>
    <script src="{{ asset('js/debounce.js') }}"></script>
    <script src="{{ asset('js/products/createCards.js') }}"></script>
    <script src="{{ asset('js/products/filter.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/products/search.js') }}"></script>

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
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        const plot_id = urlParams.get('plot_id');

        products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
            sortBy,
            typeSort,
            stylesId,
            plotsId: plot_id ? [plot_id] : [],
            techniquesId,
            materialsId,
            currentPage,
            limit
        });

        showCards(products);
        countPages = await calcPages(products.countPaintings, limit);
        createPagination(currentPage, countPages);

    })();



    sortBySelectElement.addEventListener("change", async (e) => {
        sortBy = e.target.value;
        products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
            currentPage,
            limit
        });

        hideCards(grid.getItems());
        showCards(products);
        countPages = await calcPages(products.countPaintings, limit);
        createPagination(currentPage, countPages);
    });

    sortTypeSelectElement.addEventListener("change", async (e) => {
        typeSort = e.target.value;
        products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
            currentPage,
            limit
        });

        hideCards(grid.getItems());
        showCards(products);
        countPages = await calcPages(products.countPaintings, limit);
        createPagination(currentPage, countPages);
    });

    styleCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", async () => {
            let checkedCheckboxes = document.querySelectorAll(
                "input[type=checkbox][name=style]:checked"
            );

            stylesId = [...checkedCheckboxes].map((item) => item.value);

            products = await getAllProducts(`{{ csrf_token() }}`,
                '{{ route("paintings.getAll") }}', {
                    sortBy,
                    typeSort,
                    stylesId,
                    plotsId,
                    techniquesId,
                    materialsId,
                    currentPage,
                    limit
                });

            hideCards(grid.getItems());
            showCards(products);
            countPages = await calcPages(products.countPaintings, limit);
            createPagination(currentPage, countPages);
        });
    });

    plotCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", async () => {
            let checkedCheckboxes = document.querySelectorAll(
                "input[type=checkbox][name=plot]:checked"
            );

            plotsId = [...checkedCheckboxes].map((item) => item.value);

            products = await getAllProducts(`{{ csrf_token() }}`,
                '{{ route("paintings.getAll") }}', {
                    sortBy,
                    typeSort,
                    stylesId,
                    plotsId,
                    techniquesId,
                    materialsId,
                    currentPage,
                    limit
                });

            hideCards(grid.getItems());
            showCards(products);
            countPages = await calcPages(products.countPaintings, limit);
            createPagination(currentPage, countPages);
        });
    });

    techniqueCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", async () => {
            let checkedCheckboxes = document.querySelectorAll(
                "input[type=checkbox][name=technique]:checked"
            );

            techniquesId = [...checkedCheckboxes].map((item) => item.value);

            products = await getAllProducts(`{{ csrf_token() }}`,
                '{{ route("paintings.getAll") }}', {
                    sortBy,
                    typeSort,
                    stylesId,
                    plotsId,
                    techniquesId,
                    materialsId,
                    currentPage,
                    limit
                });

            hideCards(grid.getItems());
            showCards(products);
            countPages = await calcPages(products.countPaintings, limit);
            createPagination(currentPage, countPages);

        });
    });

    materialCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", async () => {
            let checkedCheckboxes = document.querySelectorAll(
                "input[type=checkbox][name=material]:checked"
            );

            materialsId = [...checkedCheckboxes].map((item) => item.value);

            products = await getAllProducts(`{{ csrf_token() }}`,
                '{{ route("paintings.getAll") }}', {
                    sortBy,
                    typeSort,
                    stylesId,
                    plotsId,
                    techniquesId,
                    materialsId,
                    currentPage,
                    limit
                });

            hideCards(grid.getItems());
            showCards(products);
            countPages = await calcPages(products.countPaintings, limit);
            createPagination(currentPage, countPages);

        });
    });

    async function resetFilters() {
        sortBy = "price";
        typeSort = "asc";
        stylesId = [];
        plotsId = [];
        techniquesId = [];
        materialsId = [];

        products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
            currentPage,
            limit
        });

        hideCards(grid.getItems());
        showCards(products);
        countPages = await calcPages(products.countPaintings, limit);
        createPagination(currentPage, countPages);


        const checkedCheckboxes = document.querySelectorAll(
            "input[type=checkbox]:checked"
        );

        sortBySelectElement.value = sortBy;
        sortTypeSelectElement.value = typeSort;

        checkedCheckboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
    }

    async function changePage(page) {
        if (page > 0 && page <= countPages) {
            currentPage = page;

            products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
                sortBy,
                typeSort,
                stylesId,
                plotsId,
                techniquesId,
                materialsId,
                currentPage,
                limit
            });

            showCards(products);
            hideCards(grid.getItems());
            countPages = await calcPages(products.countPaintings, limit);
            createPagination(currentPage, countPages);
        }
    }

    async function createCard({
        id,
        image,
        title,
        width,
        height,
        price,
        artist,
        technique,
    }) {
        let itemElement = document.createElement("div");
        itemElement.classList.add("item", "painting-card");

        itemElement.style.cursor = "pointer";

        itemElement.addEventListener("click", (e) => {
            window.location.href = "{{ route('painting.index') }}" + `?id=${id}`;
        });

        let itemContentElement = document.createElement("div");
        itemContentElement.classList.add(
            "item-content",
            "d-flex",
            "flex-column",
            "gap-1"
        );

        let imgElement = document.createElement("img");
        imgElement.classList.add("painting-img", "mb-2");
        imgElement.src = `{{ url('storage/paintings/' . '${image}') }}`;

        let artistElement = document.createElement("div");
        artistElement.classList.add("painting-artist");
        artistElement.textContent = `${artist.surname} ${artist.name}`;

        let titleElement = document.createElement("div");
        titleElement.classList.add("painting-title");
        titleElement.textContent = title;

        let descriptionElement = document.createElement("div");
        descriptionElement.classList.add("painting-description");

        let sizeElement = document.createElement("div");
        sizeElement.classList.add("painting-size");
        sizeElement.textContent = `${width}' ш X ${height}' в`;

        let techniqueElement = document.createElement("div");
        techniqueElement.classList.add("painting-technique");
        techniqueElement.textContent = technique.name;

        let priceElement = document.createElement("div");
        priceElement.classList.add("painting-price");
        priceElement.textContent = `${price} Р`;

        descriptionElement.append(sizeElement);
        descriptionElement.append(techniqueElement);

        itemContentElement.append(imgElement);
        itemContentElement.append(artistElement);
        itemContentElement.append(titleElement);
        itemContentElement.append(descriptionElement);
        descriptionElement.append(priceElement);

        itemElement.append(itemContentElement);

        return new Promise((res) => {
            imgElement.onload = () => res(itemElement);
        });
    }

    async function searchArtist(artistId, artistName) {
        inputBox.value = artistName;
        resultBox.textContent = "";

        products = await getAllProducts(`{{ csrf_token() }}`, '{{ route("paintings.getAll") }}', {
            sortBy,
            typeSort,
            stylesId,
            plotsId,
            techniquesId,
            materialsId,
            currentPage,
            limit,
            artistId
        });

        showCards(products);
        hideCards(grid.getItems());
        countPages = await calcPages(products.countPaintings, limit);
        createPagination(currentPage, countPages);
    }

    async function handleSearchInput() {
        let result = [];
        let inputValue = inputBox.value;

        if (inputValue.length) {
            result = await getSearchArtists(`{{ csrf_token() }}`, {
                artistSearch: inputValue.toLowerCase(),
            });

            console.log(result);
        }

        display(result);

        if (!inputValue.length) {
            resultBox.textContent = "";
        }
    }

    const debounceSearchInput = debounce(handleSearchInput, 400);

    inputBox.addEventListener('keyup', debounceSearchInput);
    </script>
    @endpush