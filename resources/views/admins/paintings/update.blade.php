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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.paintings.update', $painting->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" value="{{ old('title') ?? $painting->title }}"
                    name="title">

                @error('title')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
                <div id="emailHelp" class="form-text">Минимум 3 символа.</div>
            </div>
            <div class="mb-3">
            </div>
            <div class="mb-3">
                <div>
                    <label for="image" class="form-label">Изображение</label>
                </div>
                <div>
                    <label id="imagePreview"
                        style="background-image: url({{ $painting->image ? url('storage/paintings/' . $painting->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn_hSSv9KQ5fGjyiHARZnDXiOxjWQIU2R-P4kXHlUFRXrybyPUAWW_G-frEjWpuXpuyJ8&usqp=CAU'}});"></label>
                    <input class="form-control" type="file" id="image" name="image" id="inputImage"
                        onchange="checkImage(this)">
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="text" class="form-control" id="price" value="{{ old('price') ?? $painting->price }}"
                    name="price">

                @error('price')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artist" class="form-label">Художник</label>
                <select class="form-select" aria-label="Default select example" name="artist_id" id="artist">
                    @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ $artist->id == $painting->artist->id ? 'selected' : ''}}>
                        {{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input type="text" class="form-control" id="description"
                    value="{{ old('description') ?? $painting->description }}" name="description">

                @error('description')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="width" class="form-label">Ширина</label>
                <input type="text" class="form-control" id="width" value="{{ old('width') ?? $painting->width }}"
                    name="width">

                @error('width')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="height" class="form-label">Высота</label>
                <input type="text" class="form-control" id="height" value="{{ old('height') ?? $painting->height }}"
                    name="height">

                @error('height')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="style" class="form-label">Стиль</label>
                <select class="form-select" aria-label="Default select example" name="style_id" id="style">
                    @foreach($styles as $style)
                    <option value="{{ $style->id }}" {{ $style->id == $painting->style->id ? 'selected' : ''}}>
                        {{ $style->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="plot" class="form-label">Сюжет</label>
                <select class="form-select" aria-label="Default select example" name="plot_id" id="plot">
                    @foreach($plots as $plot)
                    <option value="{{ $plot->id }}" {{ $plot->id == $painting->plot->id ? 'selected' : ''}}>
                        {{ $plot->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Материал</label>
                <select class="form-select" aria-label="Default select example" name="material_id" id="material">
                    @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ $material->id == $painting->material->id ? 'selected' : ''}}>
                        {{ $material->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="technique" class="form-label">Техника</label>
                <select class="form-select" aria-label="Default select example" name="technique_id" id="technique">
                    @foreach($techniques as $technique)
                    <option value="{{ $technique->id }}">{{ $technique->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date_creation" class="form-label">Дата</label>
                <input type="date" name="date_creation" id="date" class="form-control"
                    value="{{ old('date_creation') ?? $painting->date_creation }}">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </div>
        </form>
    </div>
</main>

<script src="{{ asset('js/createProduct.js') }}"></script>
@endsection