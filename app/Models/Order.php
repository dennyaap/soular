<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'total_price',
    ];

    
    public function orderContent() {
        return $this->belongsTo(OrderContent::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}