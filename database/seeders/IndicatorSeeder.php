<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Indicator;
use App\Models\TemplateIndicator;




class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Function to import Indicators from a csv file
        $this->importIndicators();

    }

    //Function importIndicators()
    //This function imports Indicators from a csv file
    //The csv file is in the following format:

        protected function importIndicators()
        {
            $csvFile = fopen(base_path("database/data/template_indicators.csv"), "r");

            $firstline = true;

            while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

                if (!$firstline) {

                    TemplateIndicator::create([

                        "id"            =>   $data['0'],
                        "name"          =>   $data['1'],
                        "unique_id"     =>   $data['2'],
                        "unique_code"   =>   $data['3'],
                        "has_division"  =>   $data['9'],
                        "unit_id_fk"    =>   $data['4'],
                        "subhead_id_fk" =>   $data['10'],

                    ]);    

                }

                $firstline = false;

            }

            fclose($csvFile);
        }
}
