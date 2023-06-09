@extends('templates.admin')

@section('title', 'Заказы')

@section('content')
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4 content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>№ Заказа</th>
                    <th>Стоимость</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)
                <tr class="accordion-item">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total_price }} р.</td>
                    <td>{{ $order->dateClassic }} </td>
                    <td>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.orders.updateStatus', $order->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="status_id"
                                    onchange="this.form.submit()">
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ $status->id == $order->status_id ? 'selected' : '' }}>{{ $status->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                            class="btn btn-primary p2 flex-fill">Подробнее</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection