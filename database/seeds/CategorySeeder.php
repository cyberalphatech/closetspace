<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $categories = array(
            'Bags',
            'Dresses',
            'Jacket & Coats',
            'Sleepwear',
            'Jeans',
            'Pants',
            'Shoes',
            'Shorts',
            'Skirts',
            'Sweaters',
            'Swim',
            'Tops',
            'Others',
            'Shirts',
            'Suits',
            'Blazers',
            'Bottoms',
            'Matching Sets',
            'One Pieces',
            'Pajamas',
            'Costumes'
        );
        $subIds = SubCategory::pluck('id')->toArray();
        $facker = Faker::create();
        foreach ($categories as $category) {
            factory(Category::class, 1)->create([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}