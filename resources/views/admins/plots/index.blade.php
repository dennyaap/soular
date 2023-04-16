@extends('templates.admin')

@section('title', 'Admin panel')

@section('style')
<style>
.card-img {
    width: 80px;
    height: 80px;
}
</style>
@endsection

@section('content')
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4 content">
        <div class="create-container d-flex justify-right mb-3">
            <a class="btn btn-primary me-3" href="{{ route('admin.paintings.create') }}">
                Создать
            </a>
        </div>
        @include('inc.flash')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse((old('plots') ?? $plots) as $plot)
                <tr class="align-middle">
                    <td>
                        <img src="{{ url('storage/plots/' . $plot->image) }}" class="card-img card-img-top"
                            alt="{{ $plot->title }}">
                    </td>
                    <td>{{ $plot->name }}</td>
                    <td>
                        <a href="{{ route('admin.plots.edit', $plot->id) }}"
                            class="btn btn-primary p2 flex-fill">Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.plots.destroy', $plot->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger p2 w-100">Удалить</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p>Товары данной категории отсутствуют</p>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection