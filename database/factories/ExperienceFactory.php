<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'position' => fake()->sentence(mt_rand(1, 2)),
            'datestart' => fake()->date('Y-m-d', 'now'),
            'dateend' => fake()->date('Y-m-d', 'toorrow'),
            'location' => fake()->sentence(1),
            'employe_id' => mt_rand(1, 4),
        ];
    }
}
