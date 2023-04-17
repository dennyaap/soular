<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'avatar',
        'age',
        'bio',
        'birthday',
    ];

    public function paintings() {
        return $this->hasMany(Painting::class);
    }
}