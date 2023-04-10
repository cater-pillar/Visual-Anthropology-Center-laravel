<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = $this->faker->unique()->sentence();

        return [
            'icon' => "images/general/icons8-movie-projector-80.png",
            'poster' => "images/general/plakatsva.png",
            'title' => $title,
            'extract' => $this->faker->sentence(),
            'slug' => $title
        ];
    }
}
