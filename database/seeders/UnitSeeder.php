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
        Unit::truncate();

  

        $csvFile = fopen(base_path("database/data/unit.csv"), "r");

  

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Unit::create([

                    "name" => $data['0'],

                    "unit_rank_id" => $data['1']

                ]);    

            }

            $firstline = false;

        }

   

        fclose($csvFile);
    }
}
