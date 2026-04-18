<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\Article;
=======
use App\Models\Article;
use Illuminate\Database\Seeder;
>>>>>>> d2046f5 (7 practice)

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
         Article::factory(10)->create();
         // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======
        $this->call([
            RoleSeeder::class,
            ModeratorUserSeeder::class,
        ]);

        Article::factory(10)->create();
>>>>>>> d2046f5 (7 practice)
    }
}
