<?php

// THERE IS NO NEED TO REGISTER FACTORY ADDITIONALLY ANYWHERE IN PROJECT

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_master_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'post_name' => $this->faker->name
        ];
    }
}
