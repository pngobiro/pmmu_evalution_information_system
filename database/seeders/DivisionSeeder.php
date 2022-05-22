<?php

namespace Database\Seeders;
use App\Models\Division;
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
        Division::truncate();

  

        $csvFile = fopen(base_path("database/data/division.csv"), "r");

  

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Division::create([

                    "id"                =>   $data['0'],
                    "name"              =>   $data['1'],
                    "is_active"         =>   $data['2'],
                    "code"              =>   $data['3'],
                    "deleted_at"        =>   NULL,

                ]);    

            }

            $firstline = false;

        }

  

        fclose($csvFile);
    }
}



