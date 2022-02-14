<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndicatorGroup;

class IndicatorGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IndicatorGroup::factory()->count(5)->create();
    }
}
