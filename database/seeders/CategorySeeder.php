<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=100; $i++){
            Category::create([
                'name' => 'Category'.Str::random(5),
                'image' => 'image'.$i.'.jpg',
                'active' => rand(0,1) == 1 ? true : false
            ]);
        }
    }
}
