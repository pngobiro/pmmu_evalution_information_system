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
            ['id' => '4','name' => 'Employment and Labour Relations Court'],
            ['id' => '5','name' => 'Environment and Land Court'],
            ['id' => '6','name' => 'Magistrate Court'],
            ['id' => '7','name' => 'Kadhi Court'],
            ['id' => '8','name' => 'Tribunal'],
            ['id' => '9','name' => 'Committee'],
            ['id' => '10','name' => 'Library'],
            ['id' => '11','name' => 'Directorate'],
            ['id' => '12','name' => 'Other Office'],
            ['id' => '13','name' => 'Small Claim'],
            ];

        DB::table('unit_ranks')->insert($unit_ranks);
      
    
    }
}
