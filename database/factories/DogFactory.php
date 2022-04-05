<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->name,
            'weight'=>$this->faker->biasedNumberBetween (1,24),
            'months'=>$this->faker->biasedNumberBetween (1,24),
            'price'=>$this->faker->biasedNumberBetween (100,1500),
        ];
    }
}
