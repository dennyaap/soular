<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
            [
                'name' => 'Абстракционизм',
            ],
            [
                'name' => 'Импрессионизм',
            ],
            [
                'name' => 'Кубизм',
            ],
        ]);
    }
}