<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\AdjusmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Raul',
            'last_name' => 'Gomez',
            'email' => 'raul@mexicoin.com.mx',
            'password' => bcrypt('Test1234'),
            'type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Jose',
            'last_name' => 'Perez',
            'email' => 'cliente@mexicoin.com.mx',
            'password' => bcrypt('Test1234'),
            'type' => 'client',
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            AdjusmentSeeder::class,
        ]);
    }
}
