<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\ChildResident;
use App\Models\Resident;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isEntered' => $this->faker->boolean, // Giá trị ngẫu nhiên true hoặc false
            'room_id' => function () {
                return Room::factory()->create()->id;
            },
            'room_name' => $this->faker->word,
            'building_id' => function () {
                return Building::factory()->create()->id;
            },
            'representative_lastname' => $this->faker->lastName,
            'representative_firstname' => $this->faker->firstName,
            'representative_birthdate' => $this->faker->date,
            'resident_id' => function () {
                return Resident::factory()->create()->id;
            },
            'child_resident_id' => function () {
                return ChildResident::factory()->create()->id;
            },
            'delivery_email' => $this->faker->email,
            'is_delivery_info_equal_to_entry_info' => $this->faker->boolean,
            'delivery_name' => $this->faker->name,
            'delivery_zip' => $this->faker->postcode,
            'delivery_address' => $this->faker->address,
            'delivery_tell' => $this->faker->phoneNumber,
            'usage_from_date' => $this->faker->dateTime,
            'last_login_date' => $this->faker->dateTime,
            'update_acount' => $this->faker->userName,
            'delete_acount' => $this->faker->userName,
        ];
    }
}
