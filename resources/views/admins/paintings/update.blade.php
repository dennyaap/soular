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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', $product->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" value="{{ old('title', $product->title) }}"
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
                        style="background-image: url({{ $product->image ? '/storage/products/' . $product->image : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn_hSSv9KQ5fGjyiHARZnDXiOxjWQIU2R-P4kXHlUFRXrybyPUAWW_G-frEjWpuXpuyJ8&usqp=CAU'}});"></label>
                    <input class="form-control" type="file" id="image" name="image" id="inputImage"
                        onchange="checkImage(this)">
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="text" class="form-control" id="price" value="{{ old('price', $product->price) }}"
                    name="price">

                @error('price')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="count" class="form-label">Количество</label>
                <input type="number" class="form-control" id="count" value="{{ old('count', $product->count) }}"
                    name="count">

                @error('count')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Страна</label>
                <select class="form-select" aria-label="Default select example" name="country_id" id="country">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Цвет</label>
                <select class="form-select" aria-label="Default select example" name="color_id">
                    @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
</main>

<script src="{{ asset('js/createProduct.js') }}"></script>
@endsection