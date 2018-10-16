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
        $listSubs = array(
            'Baby Bags',
            'Backpacks',
            'Cosmetics Bags & case',
            'Crossbody Bags',
            'Hobos',
            'Laptop Bags',
            'Mini Bags',
            'Satchels',
            'Shoulder Bags',
            'Totes',
            'Travel Bags',
            'Clutches & Wristlers',
            'Wallets',
            'Briefcases',
            'Duggel Bags',
            'Luggage',
            'Messenger Bags',
            'Mini',
            'Midi',
            'Maxi',
            'High Low',
            'Asymmetrical',
            'Long Sleeve',
            'One Shoulder',
            'Strapless',
            'Backless',
            'Prom',
            'Wediing',
            'Casual',
            'Formal'
        );
        $facker = Faker::create();
        foreach ($listSubs as $sub) {
            factory(SubCategory::class, 1)->create([
                'name' => $sub,
                'gender' => $facker->randomElement($genders),
                'style' => $facker->randomElement($styles),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}