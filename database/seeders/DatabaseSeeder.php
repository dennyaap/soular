<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArtistSeeder::class,
            StyleSeeder::class,
            PlotSeeder::class,
            MaterialSeeder::class,
            TechniqueSeeder::class,
            PaintingSeeder::class,
            StatusSeeder::class,
        ]);
    }
}