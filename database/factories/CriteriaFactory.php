<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pendidikan' => mt_rand(1,5),
            'penghasilan' => mt_rand(1,5),
            'keanggotaan' => mt_rand(1,4),
            'kekayaan' => mt_rand(1,4),
            'pengalaman' => mt_rand(1,5),
        ];
    }
}
