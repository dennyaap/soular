<?php

namespace App\Http\Controllers;

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
        
        return view('users.orders.index', compact('orders', 'statuses'));
    }

    public function show(Order $order) {
        $order_id = $order->id;
        $orderContents = OrderContent::all()->where('order_id', $order_id);

        return view('users.orders.content', compact('orderContents', 'order_id'));
    }

    public function cancel(Order $order) {
        if($order->update(['status_id' => 3])) {
            $orderProducts = OrderContent::where('order_id', $order->id)->get();

            foreach($orderProducts as $orderProduct) {
                $product = Painting::where('id', $orderProduct->painting_id)->first();

                $product->delete();
            }

            return back()->with(['message'=>'Заказ успешно отменен', 'category' => 'success']);
        }

        return back()->with(['message'=>'Произошла ошибка отмены заказа', 'category' => 'success']);
    }
}