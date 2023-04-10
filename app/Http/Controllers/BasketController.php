<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderContent;
use App\Models\Painting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index() {
        // $user_id = auth()->id();
        // $BasketPaintings = Basket::all()->where('user_id', $user_id);
        
        // $totalPrice = $BasketPaintings->sum('summary');

        return view('basket.index');
    }

    public function add(Request $request) {
        $paintingId = $request->data['paintingId'];
        // Получаем продукт в корзине у авторизованного пользователя
        $isBasket = Basket::getPaintingById($paintingId) == null;

        //Проверяем есть ли продукт в корзине

        if ($isBasket) {
            $basketPainting = Basket::create([
                'user_id' => auth()->id(), //auth()->user()->id
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
        // Получаем продукт в корзине у авторизованного пользователя
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
            'user_id' => $user_id, //auth()->user()->id
            'status_id' => 1,
            'total_price' => $request->data['totalPrice']
        ]);

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