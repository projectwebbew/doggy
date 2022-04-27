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
//        $geder = array_rand(['male', 'female'],1);

        $gender = array(
            'female',
            'male'
        );
        $random_name = $gender[mt_rand(0, sizeof($gender) - 1)];

        return [
            'name' => $this->faker->name,
            'gender' => $random_name,
            'weight' => $this->faker->biasedNumberBetween(1, 24),
            'months' => $this->faker->biasedNumberBetween(1, 24),
            'price' => $this->faker->biasedNumberBetween(100, 1500),
        ];
    }
}
