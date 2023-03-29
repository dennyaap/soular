<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    public function orderContent() {
        return $this->belongsTo(OrderContent::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}