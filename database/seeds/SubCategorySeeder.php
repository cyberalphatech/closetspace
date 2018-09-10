<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Gender;
use App\Models\Style;


class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('sub_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $genders = Gender::pluck('id')->toArray();
        $styles = Style::pluck('id')->toArray();
        $listSubs = array('Sneakers', 'Boots', 'Chukka Boots', 'Cowboy & Western Boots', 'Rain & Snow Boots', 'Atheletic Shoes', 'Boat Shoes', 'Loafens & Slip-Ons', 'Oxfords & Derbys', 'Sandals & Flip Flops');
        $facker = Faker::create();
        foreach ($listSubs as $sub) {
            factory(SubCategory::class, 1)->create([
                'name' => $sub,
                'gender' => $facker->randomElement($listSubs),
                'style' => $facker->randomElement($styles),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}