<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'masionMaster_id' => $this->faker->numberBetween(1, 50), // ID của masionMaster ngẫu nhiên từ 1 đến 50
            'buildingNameJapanese' => $this->faker->word, // Tên tòa nhà tiếng Nhật ngẫu nhiên
            'buildingNameEnglish' => $this->faker->word, // Tên tòa nhà tiếng Anh ngẫu nhiên
        ];
    }
}
