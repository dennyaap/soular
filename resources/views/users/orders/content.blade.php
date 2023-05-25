@extends('templates.profile')

@section('title', 'Содержание заказа')

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
        <h2>Заказ #{{ $order_id }}</h2>
        @include('inc.flash')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                @forelse((old('orderContents') ?? $orderContents) as $orderContent)
                <tr class="align-middle">
                    <td>
                        <img src="{{ asset('storage/paintings/' . $orderContent->painting->image) }}"
                            class="image-content" alt="{{ $orderContent->painting->title }}">
                    </td>
                    <td>{{ $orderContent->painting->title }}</td>
                    <td>{{ $orderContent->painting->style->name }}</td>
                    <td>{{ $orderContent->painting->price }} р.</td>
                </tr>
                @empty
                <p>Товары данной категории отсутствуют</p>
                @endforelse
            </tbody>
        </table>
        <div class="pt-5">
            <h6 class="mb-0"><a href="{{ route('user.orders.index') }}" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Вернуться к заказам</a></h6>
        </div>
    </div>
</main>
@endsection