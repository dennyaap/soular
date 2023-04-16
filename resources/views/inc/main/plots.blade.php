<section class="plots">
    <div class="plots__container">
        <div class="row row-cols-1 row-cols-md-3 g-5">
            @foreach($plots as $index => $plot)
            <div class="{{ $index != 2 ? 'col-sm-3' : 'col-sm-6' }} element-animation">
                <div class="card border-0">
                    <img src="{{ url('storage/plots/' . $plot->image) }}" class="card-img-top" alt="{{ $plot->name }}">
                    <div class="card-body">
                        <div class="card-body__container">
                            <h5 class="card-title">{{ $plot->name }}</h5>
                            <a class="card-button" href="{{ route('paintings.index') . '?plot_id=' . $plot->id }}">
                                <span>ПОДРОБНЕЕ</span>
                                <img src="{{ asset('/images/main/styles/arrow.svg') }}" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>