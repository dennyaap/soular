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
                'image' => '7BzyQHqPoGCJaN9gODADHp2XiEuunnnrt9nRJmCo.jpg',
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
                'image' => 'bJ7WQ7wAJuHoctmiCuIY0A1RjSLkX00fm0yJGO9P.jpg',
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
                'image' => 'hjbMDqhQZHXZIgUGI7mH7KbBdYIrWMCgh4S80CUC.jpg',
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
                'image' => 'bdSLFifJE9wvdj7ccvOD4wxo2S8k0KKTCNOQ4bus.jpg',
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
                'image' => 'dfQ2ZJliYAY9iNm94MkNXA8FJw9X1TttR28uYzLn.jpg',
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
                'image' => 'puZkW5Mu4jGq0KUKf21ceCZwNQ5li9cx7pOCS17V.jpg',
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
                'image' => 'km8mTKxzcZaLxgZUyRmmnnoX5yUSgqzB10gI5SeY.jpg',
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