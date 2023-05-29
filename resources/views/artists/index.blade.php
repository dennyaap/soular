@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/paintings/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/paintings/card.css') }}" />
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />

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
                    УНИКАЛЬНЫЕ РАБОТЫ ОТ
                </h5>
                <h1 class="header__title">Наших художников</h1>
            </div>
        </div>
    </div>

    <div class="paintings">
        <div class="row filter">
            <div class="col-12">
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
    <script src="{{ asset('js/artist.js') }}"></script>
    <script src="{{ asset('js/artists/createCards.js') }}"></script>
    <script src="{{ asset('js/products/filter.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>

    <script>
    let artists = [];

    function hideCards(cards) {
        grid.hide(cards);
    }

    function showCards(artists) {
        createCards(artists).then((data) => {
            const newItems = grid.add(data, {
                active: false
            });
            grid.show(newItems);
        });
    }


    (async () => {
        artists = await getAllArtists(`{{ csrf_token() }}`, '{{ route("artists.getAll") }}' {
            currentPage,
            limit
        });

        showCards(artists);
        countPages = await calcPages(artists.countArtists, limit);
        createPagination(currentPage, countPages);

    })();


    async function changePage(page) {
        if (page > 0 && page <= countPages) {
            currentPage = page;

            artists = await getAllProducts(`{{ csrf_token() }}`, {
                currentPage,
                limit
            });

            showCards(artists);
            hideCards(grid.getItems());
            countPages = await calcPages(artists.countArtists, limit);
            createPagination(currentPage, countPages);
        }
    }

    async function createCard({
        id,
        name,
        surname,
        avatar,
        patronymic,
        age,
        birthday,
    }) {
        let itemElement = document.createElement("div");
        itemElement.classList.add("item", "painting-card");

        itemElement.style.cursor = "pointer";

        itemElement.addEventListener("click", (e) => {
            window.location.href = `{{ route('artist.index') }}?id=${id}`;
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
        imgElement.src = `{{ url('storage/artists/' . '${avatar}') }}`;

        let titleElement = document.createElement("div");
        titleElement.classList.add("painting-title");
        titleElement.textContent = `${surname} ${name}`;

        let descriptionElement = document.createElement("div");
        descriptionElement.classList.add("painting-description");

        itemContentElement.append(imgElement);
        itemContentElement.append(titleElement);
        itemContentElement.append(descriptionElement);

        itemElement.append(itemContentElement);

        return new Promise((res) => {
            imgElement.onload = () => res(itemElement);
        });
    }
    </script>
    @endpush