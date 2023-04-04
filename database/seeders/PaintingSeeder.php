<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paintings')->insert([
            [
                'title' => 'Destiny II Painting',
                'image' => 'p1.jpg',
                'price' => 6000.0,
                'description' => 'Описание',
                'width' => 16,
                'height' => 24,
                'artist_id' => 2,
                'style_id' => 1,
                'material_id' => 2,
                'plot_id' => 1,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'A LA MAISON',
                'image' => 'p5.jpg',
                'price' => 8000.0,
                'description' => 'Описание',
                'width' => 20,
                'height' => 24,
                'artist_id' => 1,
                'style_id' => 2,
                'material_id' => 1,
                'plot_id' => 2,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Still life with wild flowers',
                'image' => 'p6.jpg',
                'price' => 4000.0,
                'description' => 'Описание',
                'width' => 12,
                'height' => 24,
                'artist_id' => 2,
                'style_id' => 1,
                'material_id' => 2,
                'plot_id' => 1,
                'technique_id' => 2,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Cactus Garden Painting',
                'image' => 'p3.jpg',
                'price' => 3000.0,
                'description' => 'Описание',
                'width' => 24,
                'height' => 24,
                'artist_id' => 2,
                'style_id' => 1,
                'material_id' => 2,
                'plot_id' => 2,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Dreamer',
                'image' => 'p4.jpg',
                'price' => 7000.0,
                'description' => 'Описание',
                'width' => 24,
                'height' => 24,
                'artist_id' => 1,
                'style_id' => 2,
                'material_id' => 2,
                'plot_id' => 1,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Infinity',
                'image' => 'img2.jpg',
                'price' => 9000.0,
                'description' => 'Описание',
                'width' => 18,
                'height' => 24,
                'artist_id' => 1,
                'style_id' => 1,
                'material_id' => 2,
                'plot_id' => 1,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Spring forest',
                'image' => 'water-painting.jpg',
                'price' => 6000.0,
                'description' => 'Описание',
                'width' => 18,
                'height' => 24,
                'artist_id' => 1,
                'style_id' => 2,
                'material_id' => 2,
                'plot_id' => 1,
                'technique_id' => 1,
                'date_creation'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}