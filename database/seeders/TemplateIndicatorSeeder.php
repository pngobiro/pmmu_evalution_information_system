<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Indicator;
use App\Models\TemplateIndicator;




class TemplateIndicatorSeeder extends Seeder
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

                        "id"                                                    =>   $data['0'],
                        "master_indicator_id"                                   => "" ? null : $data['1'],
                        "name"                                                  =>   $data['2'],
                        "indicator_group_id"                                    => "" ? null : $data['5'],
                        "indicator_type_id"                                     => "" ? null : $data['6'],
                        "indicator_unit_of_measure_id"                          => "" ? null : $data['7'], 
                        "indicator_weight"                                      == "" ? null : $data['8'],
                        "indicator_target"                                      == "" ? null : $data['9'],
                        "indicator_achivement"                                  == ""  ? null : $data['10'],
                        "is_backlog_indicator"                                  == "1" ? true : false,
                        "remarks"                                               =>   $data['12'] ,
                        "order"                                                 =>   $data['14'],


                    ]);    

                }

                $firstline = false;

            }

            fclose($csvFile);
        }
}
