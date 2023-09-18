<?php

namespace Database\Seeders;

use Database\Seeders\PozicijeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $this->call([
            PozicijeSeeder::class,
        ]);
    }
}
