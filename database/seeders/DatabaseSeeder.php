<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Hussain',
            'lastname' => 'Ahmed',
            'email' => 'hussain@example.com',
            'password' => 'password',
            'is_admin' => true
        ]);

        User::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password'
        ]);

        Phone::factory(20)->create();
    }
}
