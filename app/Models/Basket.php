<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'painting_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function painting() {
        return $this->belongsTo(Painting::class);
    }
    
    public static function getBasket() {
        return auth()->user()->baskets();
    }

    public static function getPaintingById($id) {
        return self::getBasket()->where('painting_id', $id)->first();
    }

    public static function getUserBasketProducts() {
        return self::getBasket()->get();
    }

}