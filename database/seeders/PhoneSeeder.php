<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhoneSeeder extends Seeder
{
    public function run()
    {
        DB::table('phones')->insert([
            [
                'name' => 'iPhone 14 Pro',
                'brand' => 'Apple',
                'price' => 1099.99,
                'stock' => 20,
                'description' => 'A premium smartphone with a powerful A16 Bionic chip.',
                'specs' => json_encode(['RAM' => '6GB', 'Storage' => '256GB', 'Battery' => '3200mAh']),
                'image' => 'phones/iphone14pro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra',
                'brand' => 'Samsung',
                'price' => 1199.99,
                'stock' => 15,
                'description' => 'A flagship device with a 200MP camera and S Pen support.',
                'specs' => json_encode(['RAM' => '12GB', 'Storage' => '512GB', 'Battery' => '5000mAh']),
                'image' => 'phones/s23ultra.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'brand' => 'Google',
                'price' => 999.99,
                'stock' => 10,
                'description' => 'An AI-powered smartphone with the latest Tensor G3 chip.',
                'specs' => json_encode(['RAM' => '12GB', 'Storage' => '128GB', 'Battery' => '4500mAh']),
                'image' => 'phones/pixel8pro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'OnePlus 12',
                'brand' => 'OnePlus',
                'price' => 799.99,
                'stock' => 25,
                'description' => 'A fast and smooth device with 120Hz AMOLED display.',
                'specs' => json_encode(['RAM' => '16GB', 'Storage' => '256GB', 'Battery' => '5000mAh']),
                'image' => 'phones/oneplus12.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Xiaomi 13 Pro',
                'brand' => 'Xiaomi',
                'price' => 899.99,
                'stock' => 18,
                'description' => 'A flagship killer with Leica camera technology.',
                'specs' => json_encode(['RAM' => '12GB', 'Storage' => '512GB', 'Battery' => '4820mAh']),
                'image' => 'phones/xiaomi13pro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
