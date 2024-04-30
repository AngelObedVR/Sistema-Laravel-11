<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Item;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=100; $i++){
            Item::create([
                'name' => 'Item'.Str::random(5),
                'description' => 'image'.$i.'.jpg',
                'barcode' => 'code'.rand(0,100),
                'buy_price' => mt_rand(1*100,200*100)/100,
                'sale_price' => mt_rand(1*100,200*100)/100,
                'stock' => rand(0,100),
                'active' => rand(0,1) == 1 ? true : false
            ]);
        }
    }
}
