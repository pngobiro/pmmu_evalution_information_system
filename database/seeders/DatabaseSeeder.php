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
      

            TemplateGroupIndicatorsSeeder::class,
            TemplateIndicatorsSeeder::class,

        ]);

    }
}

// php artisan migrate:refresh /pa
