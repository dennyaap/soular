<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'total_price',
    ];

    protected function dateClassic(): Attribute
    {
        // return Attribute::make(
        //     get: fn($value) => date_format(new DateTime($value), 'd.m.Y'),
        // );

        return Attribute::make(
            get: fn() => $this->created_at->format('d.m.Y'),
        );
    }
    
    public function orderContent() {
        return $this->belongsTo(OrderContent::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}