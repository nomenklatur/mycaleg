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
            'nama' => $this->faker->name(),
            'uri' => $this->faker->unique()->lexify(),
            'tanggal_lahir' => $this->faker->dateTime('January 1, 2002'),
            'visi' => $this->faker->paragraph(3,5),
            'misi' => $this->faker->paragraph(4,6),
            'dapil_id' => mt_rand(1,3),
            'party_id' => mt_rand(1,15),
            'criteria_id' => mt_rand(1,20),
        ];
    }
}
