<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ecomIrul extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'adidas indonesia',
                'slug' => 'adidas-indonesia',
                'logo' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'asus indonesia',
                'slug' => 'asus-indonesia',
                'logo' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'sony indonesia',
                'slug' => 'sony-indonesia',
                'logo' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('categories')->insert([
            [
                'name' => 'sepatu running',
                'slug' => 'sepatu-running',
                'icon' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'laptop smartwork',
                'slug' => 'laptop-smartwork',
                'icon' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'gaming console',
                'slug' => 'gaming-console',
                'icon' => 'https:1212121212',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('promo_codes')->insert([
            [
                'code' => 'IRUL100',
                'discount_amount' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'IRUL500',
                'discount_amount' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'IRUL200',
                'discount_amount' => 200000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('shoes')->insert([
            [
                'name' => 'nike air jordan',
                'slug' => 'nike-air-jordan',
                'thumbnail' => 'https://12312',
                'about' => 'lorem ipsum dolor sit amet',
                'price' => 100000,
                'category_id' => 1,
                'brand_id' => 1,
                'is_popular' => 1,
                'stock' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'laptop advan workplus',
                'slug' => 'laptop-advan-workplus',
                'thumbnail' => 'https://12312',
                'about' => 'lorem ipsum dolor sit amet',
                'price' => 200000,
                'category_id' => 1,
                'brand_id' => 1,
                'is_popular' => 1,
                'stock' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'sony camera AZARUL',
                'slug' => 'sony-camera-AZARUL',
                'thumbnail' => 'https://12312',
                'about' => 'lorem ipsum dolor sit amet',
                'price' => 100000,
                'category_id' => 1,
                'brand_id' => 1,
                'is_popular' => 1,
                'stock' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('shoe_photos')->insert([
            [
                'shoe_id' => 1,
                'photo' => 'https:123121',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'shoe_id' => 2,
                'photo' => 'https:123121',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'shoe_id' => 3,
                'photo' => 'https:123121',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('shoe_sizes')->insert([
            [
                'shoe_id' => 1,
                'size' => '40',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'shoe_id' => 1,
                'size' => '41',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'shoe_id' => 1,
                'size' => '42',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
