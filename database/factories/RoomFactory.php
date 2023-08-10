<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' => $this->faker->numberBetween(1, 100),
            'room_name' => $this->faker->word, // Tên phòng ngẫu nhiên
            'building_id' => $this->faker->numberBetween(1, 10), // ID tòa nhà ngẫu nhiên từ 1 đến 10
        ];
    }
}
