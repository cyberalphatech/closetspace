<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->truncate();
        $listStyles = array('Casual', 'Trendy', 'Elegant', 'Sport');
        $styleVars = [];
        foreach ($listStyles as $style) {
            $styleVar = [
                'name' => $style,
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($styleVars, $styleVar);
        }
        $style = Style::insert($styleVars);
    }
}