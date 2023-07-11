<?php

namespace Database\Factories;

use App\Models\Post\Post;
use App\Models\Post\Status;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(15),
            'slug' => $this->faker->slug,
            'content' => $this->faker->text(),
            'status' => Status::NOT_ACCEPT->value
        ];
    }

    public function accept(): PostFactory
    {
        return $this->state(function () {
            return [
                'status' => Status::ACCEPT->value
            ];
        });
    }
}

