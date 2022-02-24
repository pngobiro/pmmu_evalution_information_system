<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PmmuTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $rank_id=6;
        $fy_id=5;
        
        $template_group = TemplateIndicatorGroup::where('unit_id',$unit->id)->get();

        foreach ($template_group as $group ){

            IndicatorGroup::create([

                "id" => $data['0'],
                "name" => $data['1'],
                "description" => $data['2'],
                "order" => $data['3'],
                "unit_id" => $data['4'],
                "unit_rank_id" => $rank_id,
                "financial_year_id" => $fy_id,
                "created_at" => $data['7'],
                "updated_at" => $data['8'],

            
            ]); 

     
            

        };




    }
}
