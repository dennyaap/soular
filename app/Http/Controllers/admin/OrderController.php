<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderContent;
use App\Models\Painting;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders() {
        $orders = Order::where('user_id', auth()->id())->get();
        $statuses = Status::all();
        
        return view('admins.orders.index', compact('orders', 'statuses'));
    }

    public function show(Order $order) {
        $order_id = $order->id;
        $orderContents = OrderContent::where('order_id', $order_id)->get();

        return view('admins.orders.content', compact('orderContents', 'order_id'));
    }

    public function cancel(Order $order) {
        if($order->update(['status_id' => 3])) {
            return back()->with(['message'=>'Заказ успешно отменен', 'category' => 'success']);
        }

        return back()->with(['message'=>'Произошла ошибка отмены заказа', 'category' => 'success']);
    }

    public function updateStatus(Order $order, Request $request) {
        if($order->update(['status_id' => $request->status_id])) {
            return back()->with(['message'=>'Статус успешно обновлен', 'category' => 'success']);
        }

        return back()->with(['message'=>'Возникли ошибки обновления статуса', 'category' => 'success']);

    }
}