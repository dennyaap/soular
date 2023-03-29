@extends('templates.app')

@section('title', 'Главная')

@push('style')
<link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/header/header.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/about/about.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/styles/styles.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/arts/arts.css') }}" />
@endpush

@section('content')

@include('inc.main.header')

<div class="container">
    @include('inc.main.about')
    @include('inc.main.styles')
</div>
@include('inc.main.arts')

@endsection()

@push('script')
<script src="{{ asset('js/animation.js') }}"></script>
@endpush