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
            'uri' => $this->faker->regexify('[a-z]{8}[0-4]{3}'),
            'kepanjangan' => null,
            'gambar' => $this->faker->randomElement(['1.svg', '2.svg', '3.svg', '4.svg', '5.svg', '6.svg', '7.svg', '8.svg', '9.svg', '10.svg']),
        ];
    }
}
