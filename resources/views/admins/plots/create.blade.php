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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.plots.store') }}">
            @csrf

            <div class="mb-3">
                <div>
                    <label for="image" class="form-label">Изображение</label>
                </div>
                <div>
                    <label id="imagePreview"></label>
                    <input class="form-control" type="file" id="image" name="image" id="inputImage"
                        onchange="checkImage(this)">
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">

                @error('name')
                <p class="text-danger fz-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
</main>

<script src="{{ asset('js/createProduct.js') }}"></script>
@endsection