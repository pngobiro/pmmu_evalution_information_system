<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class UnitOfMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_of_measure =      [
            ['id' => '1','name' => 'Percentage'],
            ['id' => '2','name' => 'No. of Days'],
            ['id' => '3','name' => 'Report'],
            ['id' => '4','name' => 'Number'],
    
        
            ];
        DB::table('indicator_unit_of_measures')->insert($unit_of_measure);
       
    }
}
