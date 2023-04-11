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
                    <th>Категория</th>
                    <th>Цена</th>
                    <th class="text-center">Дата</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse((old('paintings') ?? $paintings) as $painting)
                <tr class="align-middle">
                    <td>
                        <img src="{{ asset('images/paintings/' . $painting->image) }}" class="card-img card-img-top"
                            alt="{{ $painting->title }}">
                    </td>
                    <td>{{ $painting->title }}</td>
                    <td>{{ $painting->style->name }}</td>
                    <td>{{ $painting->price}} р.</td>
                    <td class="text-center">{{ $painting->dateClassic }}</td>
                    <td>
                        <a href="{{ route('painting.index') . '?id=' . $painting->id }}"
                            class="btn btn-primary p2 flex-fill">Подробнее</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.paintings.edit', $painting->id) }}"
                            class="btn btn-primary p2 flex-fill">Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.paintings.destroy', $painting->id) }}">
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