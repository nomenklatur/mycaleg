<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalegFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'identifier' => $this->faker->unique()->lexify('??????'),
            'birthday' => $this->faker->dateTime('January 1, 2002'),
            'vision' => $this->faker->paragraph(3,5),
            'mission' => $this->faker->paragraph(4,6),
            'dapil_id' => mt_rand(1,3),
            'party_id' => mt_rand(1,15),
        ];
    }
}
