<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Post;
use Nette\Utils\Random;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['App\Models\Post', 'App\Models\Page'];
        $comment = Arr::random($type);
        $id = [Post::factory(), Page::factory()];
        return [
            'body' => fake()->paragraph(),
            'date' => fake()->date(),
            'commentable_type' => $comment,
            'commentable_id' => Arr::random($id),

        ];
    }
}
