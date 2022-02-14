<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IndicatorGroupFactory extends Factory
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
            'description' => $this->faker->paragraph(),
            'order' => 1,
            'unit_id' => 1,
          
        ];
    }
}
