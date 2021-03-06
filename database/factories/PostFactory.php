<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
    public function definition()
    {
        return [
            "post_title"=> $this->faker->sentence(),
            "body"=>$this->faker->paragraph(),
            "user_id"=>1,
            "views"=>rand(0,100),
            "category_id" =>1,
            "manufacturer_id" =>1,
            "post_image"=> $this->faker->image(),
        ];
    }
}
