<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Notes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteContent>
 */
class NoteContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note_id' => Notes::factory(),
            'content' => fake()->sentence(),
        ];
    }
}
