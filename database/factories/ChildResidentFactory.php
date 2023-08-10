<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_residents_count' => $this->faker->numberBetween(1, 10), // Số lượng cư dân ngẫu nhiên từ 1 đến 5
        ];
    }
}
