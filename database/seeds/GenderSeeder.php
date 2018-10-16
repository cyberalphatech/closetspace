<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('genders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $listGenders = array('Man', 'Kid', 'Woman', 'Senior');
        $genderVars = [];
        foreach ($listGenders as $gender) {
            $genderVar = [
                'name' => $gender,
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($genderVars, $genderVar);
        }
        $gender = Gender::insert($genderVars);
    }
}