<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'price',
        'description',
        'width',
        'height',
        'date_creation',
        'plot_id',
        'style_id',
        'technique_id',
        'material_id',
        'artist_id'
    ];

    public function style() {
        return $this->belongsTo(Style::class);
    }

    public function plot() {
        return $this->belongsTo(Plot::class);
    }

    public function technique() {
        return $this->belongsTo(Technique::class);
    }

    public function material() {
        return $this->belongsTo(Material::class);
    }
    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function orderContent() {
        return $this->hasMany(OrderContent::class);
    }

    protected function dateClassic(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->format('d.m.Y'),
        );
    }
}