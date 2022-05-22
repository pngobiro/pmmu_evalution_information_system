<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Unit::truncate();

  

        $csvFile = fopen(base_path("database/data/unit.csv"), "r");

  

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Unit::create([

                    "id"                    =>   $data['0'],
                    "name"                  =>   $data['1'],
                    "unique_id"             =>   $data['2'],
                    "unique_code"           =>   $data['3'],
                    "has_division"          =>   $data['9'],
                    "unit_rank_id"          =>   $data['4'],
                    "head_id_fk"            =>   $data['4'],
                    "subhead_id_fk"         =>   $data['10'],
                    "has_pmmu_division"     =>   false,

                ]);    

            }

            $firstline = false;

        }

  

        fclose($csvFile);
    }
}


