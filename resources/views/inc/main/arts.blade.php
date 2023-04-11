<section class="arts">
    <div class="container">
        <div class="section__container">
            <div class="section__content">
                <h1 class="section__title">
                    Удивительный домашний декор <span class="bold-font">И ОТЛИЧНАЯ ИДЕЯ ИДЕЯ ДЛЯ ПОДАРКА ЖДУТ ВАС.
                    </span>
                    Купите прекрасную картину <div class="bold-font">ПРЯМО ЗДЕСЬ!</div>
                </h1>
                <div class="section__description">
                    <div class="section__line"></div>
                    <h5 class="section__description-sub__title">ЭКСПОНАТЫ</h5>
                    <h1 class="section__description-title">Недавно добавленные</h1>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-5 arts__container d-flex align-items-end">
                @foreach($paintings as $key => $painting)
                <div class="col element-animation">
                    <div class="card border-0">
                        <img src="{{ asset('images/paintings/'. $painting->image) }}" alt="{{ $painting->title }}">
                        <div class="art__card-body">
                            <div class="art__card-container">
                                <p class="card-title art__card-artist">{{ $painting->artist->name}}</p>
                                <p class="card-title art__card-title">{{ $painting->title }}</p>
                                <a class="art__card-button"
                                    href="{{ route('painting.index') . '?id=' . $painting->id }}">
                                    <span>{{ $painting->price }} Р</span>
                                    <img src="{{ asset('../../images/main/arts/arrow.svg') }}"
                                        alt="{{ $painting->title }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="arts__footer">
        <a class="btn-more arts__btn-more" href="{{ route('paintings.index') }}">ПОКАЗАТЬ БОЛЬШЕ</a>
    </div>
</section>