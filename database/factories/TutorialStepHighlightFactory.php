<?php

namespace Database\Factories;

use App\Models\TutorialStep;
use App\Models\TutorialStepHighlight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutorialStepHighlight>
 */
class TutorialStepHighlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tutorial_step_id' => TutorialStep::factory(),
            'x' => fake()->randomFloat(2, 0, 1000),
            'y' => fake()->randomFloat(2, 0, 1000),
            'width' => fake()->randomFloat(2, 50, 200),
            'height' => fake()->randomFloat(2, 50, 200),
            'data' => [],
        ];
    }
}
