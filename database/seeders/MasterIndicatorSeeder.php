<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterIndicator;
class MasterIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterIndicator::truncate();
        $csvFile = fopen(base_path("database/data/master_indicators.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                MasterIndicator::create([
                    "id" =>                             $data['0'],
                    "name" =>                           $data['1'],
                    "unit_rank_id" =>                   $data['2'],
                    "unit_id" =>                        5,
                ]);  
            }

            $firstline = false;
        }
        fclose($csvFile);
    }
}
