<?php

namespace Database\Seeders;
use App\Models\RankCategory;
use Illuminate\Database\Seeder;

class RankCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RankCategory::truncate();

  

        $csvFile = fopen(base_path("database/data/rank_categories.csv"), "r");

  

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                RankCategory::create([

                    "id"                    =>   $data['0'],
                    "name"                  =>   $data['1'],
                    "description"           =>   $data['2'],
                    "unit_rank_id"          =>   $data['3'],
              

                ]);    

            }

            $firstline = false;

        }

  

        fclose($csvFile);
    }
}
