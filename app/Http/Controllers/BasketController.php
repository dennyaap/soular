<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index() {
        $userName = Auth::user()->surname . ' ' . Auth::user()->name . ' ' . Auth::user()->patronymic;
        $userEmail = Auth::user()->email;
        $userAddress = Auth::user()->address;
        $userPhone = Auth::user()->phone;
        
        return view('checkout.index', compact('userName', 'userEmail', 'userAddress', 'userPhone'));
    }

    public function add(Request $request) {
        $paintingId = $request->data['paintingId'];
        $isBasket = Basket::getPaintingById($paintingId) == null;


        if ($isBasket) {
            $basketPainting = Basket::create([
                'user_id' => auth()->id(),
                'painting_id' => $paintingId,
            ]);
        }
        return $isBasket;
    }


    public function destroy(Request $request) {
        $basketPainting = Basket::getPaintingById($request->data['paintingId']);
        
        if($basketPainting->delete()) {
            return new BasketResource($basketPainting);
        }
        return back()->with(['message'=>'Ошибка удаления товара', 'category' => 'success']);
    }

    public function getUserPaintings() {
        $basketPaintings = Basket::getUserBasketPaintings();

        $paintings = [];

        foreach($basketPaintings as $painting) {
            
            array_push($paintings, new BasketResource($painting));
        }

        return $paintings;
    }

    public function checkout(Request $request)
    {
        $user_id = auth()->id();
        
        $order = Order::create([
            'user_id' => $user_id,
            'status_id' => 1,
            'total_price' => $request->data['totalPrice'],
            'type_shipping' => $request->data['typeShipping']
        ]);

        $basketProducts = Basket::getBasket()->get();

        foreach ($basketProducts as $basketProduct) {
            OrderContent::create([
                'painting_id' => $basketProduct->painting_id,
                'order_id' => $order->id,
            ]);
        }

        $this->destroyAllPaintings($user_id);
                
        return $order;
    }

    public function destroyAllPaintings($user_id) {
        if(Basket::where('user_id', $user_id)->delete()) {
            return True;
        }

        return False;
    }


    public function checkPassword(Request $request) {
        $id = auth()->id();
        $password = $request->data['password'];

        if(Auth::attempt(compact('id', 'password'))) {
            return 'true';
        }

        return 'false';
    }

    
}