<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndicatorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicator_type =      [
            ['id' => '1','name' => 'Special '],
            ['id' => '2','name' => 'Normal'],
            ['id' => '3','name' => 'Declining'],

        
            ];
        DB::table('indicator_types')->insert($indicator_type);
       
    }
}
