<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TemplateIndicator;

class TemplateIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemplateIndicator::truncate();
        $csvFile = fopen(base_path("database/data/template_indicators.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                TemplateIndicator::create([
                    "id" =>                             $data['0'],
                    "name" =>                           $data['1'],
                    "unit_rank_id" =>                   $data['2'],
                    "unit_id" =>                        $data['3'],
                    "indicator_group_id" =>             $data['4'],
                    "indicator_type_id" =>              $data['5'],
                    "indicator_unit_of_measure_id" =>   $data['6'],
                    "indicator_weight" =>               $data['7'],
                    "indicator_target" =>               $data['8'],
                    "indicator_achivement" =>           $data['9'],
                    "remarks" =>                        $data['10'],
                    "order" =>                          $data['11'],
                    "created_at" =>                     $data['12'],
                    "updated_at" =>                     $data['13'],
                ]);  
            }

            $firstline = false;
        }
        fclose($csvFile);
    }
}
