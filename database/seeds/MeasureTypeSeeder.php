<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Gender;
use App\Models\MeasureType;

class MeasureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('measure_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $measureTypes = array(
            'Hourglass' => 3,
            "inverted triangle" => 3,
            'Triangle' => 3,
            'Apple' => 3,
            'Rectangle' => 3,
            'Triangle'=> 1,
            'Inverted Triangle'=>1,
            'Rectangle'=>1,
            'Trapezoid' => 1,
            'Oval'=>1
        );
        foreach ($measureTypes as $name => $gender) {
            factory(MeasureType::class, 1)->create([
                'name' => $name,
                'gender_id' => $gender,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}