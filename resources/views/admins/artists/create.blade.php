@extends('templates.admin')

@section('title', 'Admin panel')

@section('content')

<style>
#imagePreview {
    display: inline-block;
    width: 300px;
    height: 360px;
    background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn_hSSv9KQ5fGjyiHARZnDXiOxjWQIU2R-P4kXHlUFRXrybyPUAWW_G-frEjWpuXpuyJ8&usqp=CAU');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}
</style>

<main style="margin-top: 58px">
    <div class="container pt-4 content">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.artists.store') }}">
            @csrf

            <div class="mb-3">
                <div>
                    <label for="avatar" class="form-label">Изображение</label>
                </div>
                <div>
                    <label id="imagePreview"></label>
                    <input class="form-control" type="file" id="avatar" name="avatar" id="inputImage"
                        onchange="checkImage(this)">
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">

                @error('name')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
                <div id="emailHelp" class="form-text">Минимум 3 символа.</div>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="surname" value="{{ old('surname') }}" name="surname">

                @error('surname')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
                <div id="emailHelp" class="form-text">Минимум 3 символа.</div>
            </div>
            <div class="mb-3">
                <label for="patronymic" class="form-label">Отчество</label>
                <input type="text" class="form-control" id="patronymic" value="{{ old('patronymic') }}"
                    name="patronymic">

                @error('patronymic')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
                <div id="emailHelp" class="form-text">Минимум 3 символа.</div>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст</label>
                <input type="number" class="form-control" id="age" value="{{ old('age') }}" name="age">

                @error('age')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Биграфия</label>
                <input type="text" class="form-control" id="bio" value="{{ old('bio') }}" name="bio">

                @error('bio')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Дата рождения</label>
                <input type="date" name="birthday" id="date" class="form-control">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
</main>

<script src="{{ asset('js/createProduct.js') }}"></script>
@endsection