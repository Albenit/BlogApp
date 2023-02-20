<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = [
            1 => ['category_name' => 'Beauty'],
            2 => ['category_name' => 'Sport'],
            3 => ['category_name' => 'Health'],
            4 => ['category_name' => 'Travel']
        ];

        foreach($categorys as $category){
            Category::create([
                'category_name' => $category['category_name']
            ]);
        }
    }
}
