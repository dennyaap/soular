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
            <a class="btn btn-primary me-3" href="{{ route('admin.styles.create') }}">
                Создать
            </a>
        </div>
        @include('inc.flash')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse((old('styles') ?? $styles) as $style)
                <tr class="align-middle">

                    <td>{{ $style->name }}</td>
                    <td>
                        <a href="{{ route('admin.styles.edit', $style->id) }}"
                            class="btn btn-primary p2 flex-fill">Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.styles.destroy', $style->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger p2 w-100">Удалить</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p>Стили отсутствуют</p>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection