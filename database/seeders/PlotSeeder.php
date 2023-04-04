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
            ],
            [
                'name' => 'Иллюстрации',
            ],
            [
                'name' => 'Пейзаж',
            ],
        ]);
    }
}