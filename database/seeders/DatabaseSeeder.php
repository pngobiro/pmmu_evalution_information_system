<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call([
            //UserSeeder::class,
           // FinancialYearSeeder::class,
            //UnitRankSeeder::class,
           // UnitSeeder::class,
           // IndicatorTypeSeeder::class,
           // UnitOfMeasureSeeder::class,
            //IndicatorGroupSeeder::class,
          //  IndicatorSeeder::class,
            TemplateGroupIndicatorsSeeder::class,
            TemplateIndicatorsSeeder::class

        ]);

    }
}
