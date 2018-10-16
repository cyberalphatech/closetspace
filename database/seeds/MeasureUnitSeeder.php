<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\MeasureUnit;

class MeasureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('measure_units')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $units = array('Metric'=>'centimeters', 'Imperial'=>'Inch', 'Standard' => 'xtra small , small , Large .xtra large');
        $facker = Faker::create();
        $i = 0;
        foreach ($units as $key => $value) {
            $i++;
            factory(MeasureUnit::class, 1)->create([
                'name' => $key,
                'description' => $value,
                'value' => $i
            ]);
        }
    }
}