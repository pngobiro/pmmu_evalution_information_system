<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_ranks =      [
            ['id' => '1','name' => 'Supreme Court'],
            ['id' => '2','name' => 'Court of Appeal'],
            ['id' => '3','name' => 'High Court'],
            ['id' => '4','name' => 'ELC'],
            ['id' => '5','name' => 'ELRC'],
            ['id' => '6','name' => 'Magistrate Court'],
            ['id' => '7','name' => 'Kadhi Court'],
            ['id' => '8','name' => 'Small Claims Court'],
            ['id' => '9','name' => 'Tribunals'],
            ['id' => '10','name' => 'Directorates'],
            ['id' => '11','name' => 'Registers'],
        
            ];
        DB::table('unit_ranks')->insert($unit_ranks);
       
    
    }
}
