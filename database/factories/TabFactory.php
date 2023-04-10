<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Program;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tab>
 */
class TabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Program::all()->random()->id;
        return [
            'program_id' => Program::all()->random()->id,
            'title' => $this->faker->word(),
            'content' => $this->faker->sentence(),
        ];
    }
}
