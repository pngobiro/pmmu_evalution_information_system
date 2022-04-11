<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divsion::truncate();

  

        $csvFile = fopen(base_path("database/data/division.csv"), "r");

  

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Unit::create([

                    "id"            =>   $data['0'],
                    "name"          =>   $data['1'],
                    "active"        =>   $data['2'],
                    "code"          =>   $data['3'],
                    "deleted_at"    =>   $data['6'],

                ]);    

            }

            $firstline = false;

        }

  

        fclose($csvFile);
    }
}
