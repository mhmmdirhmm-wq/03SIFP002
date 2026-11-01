<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            [
                'name' => 'laptop asus vivobook',
                'descriptions' => 'laptop bisnis dengan performa tinggi',
                'price' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'smartphone samsung',
                'descriptions' => 'smartphone bisnis dengan performa tinggi',
                'price' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('products')->insert($product); 
        $this->command->info('product seeded success');
    }
}