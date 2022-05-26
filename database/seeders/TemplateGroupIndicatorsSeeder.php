<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TemplateIndicatorGroup;

class TemplateGroupIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemplateIndicatorGroup::truncate();
        $csvFile = fopen(base_path("database/data/template_indicator_groups.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                TemplateIndicatorGroup::create([
                    "id"                => $data['0'],
                    "name"              => $data['1'],
                    "description"       => $data['2'],
                    "order"             => $data['3'],
                    "unit_id"           => $data['4'],
                    "unit_rank_id"      => $data['5'],
                    "financial_year_id" => $data['6'],
                    "rank_category_id"  => $data['7'],
                ]);  
            }

            $firstline = false;
        }
        fclose($csvFile);
    }
}
