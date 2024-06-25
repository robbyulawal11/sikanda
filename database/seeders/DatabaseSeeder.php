<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Catalog;
use App\Models\Profile;
use App\Models\Gallery;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // UserSeeder::class,
            // ArticleSeeder::class,
            // CatalogSeeder::class,
            // GalerySeeder::class,
            // ProfileSeeder::class,
            CategorySeeder::class
        ]);
    }
}
