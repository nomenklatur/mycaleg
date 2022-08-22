<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->unique()->randomElement(['PKB', 'GERINDRA', 'PDIP', 'GOLKAR', 'NASDEM', 'GPI', 'BERKARYA', 'PKS', 'PPI', 'PPP', 'PAN', 'HANURA', 'DEMOKRAT', 'PBB', 'PKPI']),
            'kepanjangan' => null,
        ];
    }
}
