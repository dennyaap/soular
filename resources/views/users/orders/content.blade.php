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
                    <th class="text-center">Дата</th>
                    <th class="text-center">Количество</th>
                    <th>Общая стоимость</th>
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>
                @forelse((old('orderContents') ?? $orderContents) as $orderContent)
                <tr class="align-middle">
                    <td>
                        <img src="{{ url('/storage/products/' . $orderContent->product->image) }}"
                            class="card-img card-img-top"
                            alt="{{ url('/storage/public/products/' . $orderContent->product->image) }}">
                    </td>
                    <td>{{ $orderContent->product->title }}</td>
                    <td>{{ $orderContent->product->category->name }}</td>
                    <td class="text-center">{{ $orderContent->product->dateClassic }}</td>
                    <td class="text-center">{{ $orderContent->count }}</td>
                    <td>{{ $orderContent->product->price * $orderContent->count}} р.</td>

                    <!-- <td>
              <form method="POST" action="{{ route('admin.products.destroy', $orderContent->order_id) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger p2 w-100">Удалить</button>
                        </form>
            </td>    -->
                </tr>
                @empty
                <p>Товары данной категории отсутствуют</p>
                @endforelse
            </tbody>
        </table>
        <div class="pt-5">
            <h6 class="mb-0"><a href="{{ route('admin.orders.index') }}" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Вернуться к заказам</a></h6>
        </div>
    </div>
</main>
@endsection