<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_category_id' => 1,
                'name' => 'Kue Kering',
                'size' => '20x20 cm',
                'image_url' => 'www.google.com',
                'desc'=> 'kuee kerring',
                'price'=>1000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 2,
                'name' => 'Cookies',
                'size' => '30x30 cm',
                'desc'=> 'cooekis kerring',
                'price'=>3000,
                'image_url' => 'www.google.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 1,
                'name' => 'Kue baru',
                'size' => '20x20 cm',
                'image_url' => 'www.google.com',
                'desc'=> 'kuee baru jadii',
                'price'=>2000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 2,
                'name' => 'Cookies baru',
                'size' => '30x30 cm',
                'image_url' => 'www.google.com',
                'desc'=> 'cookies variant baru',
                'price'=>5000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);
    }
}
