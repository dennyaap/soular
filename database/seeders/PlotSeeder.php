<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plots')->insert([
            [
                'name' => 'Абстракции',
                'image' => 'image1.jpg'
            ],
            [
                'name' => 'Иллюстрации',
                'image' => 'image2.jpg'
            ],
            [
                'name' => 'Пейзаж',
                'image'=> 'image3.jpg'
            ],
        ]);
    }
}