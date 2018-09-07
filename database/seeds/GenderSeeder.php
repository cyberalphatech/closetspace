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
        DB::table('genders')->truncate();
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