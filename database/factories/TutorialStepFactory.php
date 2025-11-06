<?php

namespace Database\Factories;

use App\Models\Tutorial;
use App\Models\TutorialStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutorialStep>
 */
class TutorialStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tutorial_id' => Tutorial::factory(),
            'media_id' => null,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'order' => fake()->numberBetween(0, 10),
        ];
    }
}
