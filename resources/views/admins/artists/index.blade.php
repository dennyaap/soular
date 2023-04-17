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
            <a class="btn btn-primary me-3" href="{{ route('admin.artists.create') }}">
                Создать
            </a>
        </div>
        @include('inc.flash')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Возраст</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse((old('artists') ?? $artists) as $artist)
                <tr class="align-middle">
                    <td>
                        <img src="{{ url('storage/artists/' . $artist->avatar) }}" class="card-img card-img-top"
                            alt="artist">
                    </td>
                    <td>{{ $artist->name }}</td>
                    <td>{{ $artist->surname }}</td>
                    <td>{{ $artist->patronymic}}</td>
                    <td class="text-center">{{ $artist->age }}</td>
                    <td>
                        <a href="{{ route('artists.index') . '?id=' . $artist->id }}"
                            class="btn btn-primary p2 flex-fill">Подробнее</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.artists.edit', $artist->id) }}"
                            class="btn btn-primary p2 flex-fill">Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.artists.destroy', $artist->id) }}">
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