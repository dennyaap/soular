<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                'name' => 'Анна',
                'surname' => 'Паюсова',
                'patronymic' => 'Анна',
                'bio' => 'Я Аня',
                'age' => 19,
                'avatar' => 'https://images.unsplash.com/photo-1551180452-aea351b23949?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8YXJ0aXN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
                'birthday'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'Платон',
                'surname' => 'Стерхов',
                'patronymic' => 'Владиславович',
                'bio' => 'Я Платон',
                'age' => 19,
                'avatar' => 'https://images.unsplash.com/photo-1529066792305-5e4efa40fde9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80',
                'birthday'=> now(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}