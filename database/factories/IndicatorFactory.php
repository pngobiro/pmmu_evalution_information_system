<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class IndicatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'indicator_group_id' => 5,
            'indicator_type_id' => 1,
            'indicator_unit_of_measure_id' =>1,
            'indicator_weight' =>5,
            'indicator_target' => 100,
            'indicator_achivement' => 80, // password
            'remarks' => $this->faker->paragraph()
        ];
    }
}
