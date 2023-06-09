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
                    src="{{ url('storage/artists/' . $artist->avatar) }}" alt="artist" />
            </div>
            <div class="col-md-8">
                <!-- <div class="artist">{{ $artist->name }} {{ $artist->surname}} {{ $artist->name }} {{ $artist->surname}}
                </div> -->
                <div class="title">{{ $artist->surname}} {{ $artist->name }} {{ $artist->patronymic }}
                </div>
                <div class="fs-5 mb-3">
                    <!-- <span class="text-decoration-line-through">$45.00</span> -->
                    <span class="price">{{ $artist->age }} лет</span>
                </div>

                <p class="lead mt-4 description">{{ $artist->bio }}</p>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="paintings-container" id="painting-container">
            <h2 class="mb-4 paintings-title">Работы художника</h2>
            <div class="grid">
                @foreach($paintings as $painting)
                <a class="item painting-card" href="{{ route('painting.index') . '?id=' . $painting->id }}">
                    <div class="item-content d-flex flex-column gap-1"><img class="painting-img mb-2"
                            src="{{ url('storage/paintings/' . $painting->image) }}">
                        <div class="painting-artist">{{ $painting->artist->surname}} {{ $painting->artist->name }}</div>
                        <div class="painting-title">{{ $painting->title }}</div>
                        <div class="painting-description">
                            <div class="painting-size">{{ $painting->width }}' ш X {{ $painting->height}}' в</div>
                            <div class="painting-technique">{{ $painting->technique->name}}</div>
                            <div class="painting-price">{{ $painting->price }} Р</div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script src="{{ asset('/js/script.js')}}"></script>
<script src="{{ asset('/js/fetch.js')}}"></script>

<script>
const btnAddBasket = document.getElementById('btn__add-basket');

btnAddBasket.addEventListener('click', async (e) => {
    e.preventDefault();
    await addBasket(e.target.dataset.id).then(() => {
        btnAddBasket.textContent = 'В корзине';

        btnAddBasket.addEventListener('click', async (e) => {
            goTo(`{{ route('basket.index') }}`);
        });
    });
});

async function addBasket(paintingId) {
    return postJSON(`{{ route('basket.add') }}`, {
            paintingId
        }, `{{ csrf_token() }}`,
        'POST');
}

function goTo(route) {
    window.location.href = route;
}
</script>

@endpush