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
                        "master_indicator_id"                                   =>   $data['1'],
                        "name"                                                  =>   $data['2'],
                        "indicator_group_id"                                    =>   $data['5'],
                        "indicator_group_id"                                    =>   $data['6'],
                        "indicator_type_id"                                     =>   $data['7'],
                        "indicator_unit_of_measure_id"                          =>   $data['8'],
                        "indicator_weight"                                      =>   $data['9'],
                        "indicator_target"                                      =>   $data['10'],
                        "indicator_achivement"                                  =>   $data['11'],
                        "is_backlog_indicator"                                  =>   $data['12'],
                        "remarks"                                               =>   $data['13'] ,
                        "order"                                                 =>   $data['15'],
                

                    ]);    

                }

                $firstline = false;

            }

            fclose($csvFile);
        }
}
