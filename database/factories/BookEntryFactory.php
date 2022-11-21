<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookEntry>
 */
class BookEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     * Generates random values for book entries with the library faker.
     * Title is a simple sentence.
     * Text a 5 sentence paragraph.
     * Released either false or true.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'text' => fake()->paragraph(5),
            'released' => fake()->boolean()
        ];
    }
}
