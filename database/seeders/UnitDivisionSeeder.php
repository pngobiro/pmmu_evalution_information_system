<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UnitDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //import unit_division data from csv file and  skip first row

        $file = fopen(database_path() . '/data/unit_division.csv', 'r');
        //skip first row
        fgetcsv($file);
        while (($line = fgetcsv($file)) !== FALSE) {
            DB::table('unit_division')->insert([
                'id' => $line[0],
                'unit_id' => $line[1],
                'division_id' => $line[2],
            ]);
        }
        fclose($file);
    }

    
    }



