<?php

namespace Database\Seeders;

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
        \App\Models\Category::factory()->count(5)->create();
        \App\Models\Manufacturer::factory()->count(5)->create();
        \App\Models\Post::factory()->count(30)->create();
    }
}
