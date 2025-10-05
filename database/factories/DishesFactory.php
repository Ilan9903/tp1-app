<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dishes;
use App\Models\User;

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dishes>
 */
class DishesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->title,
            'recette' => $this->faker->text(),
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            // 'likes' => $this->faker->randomDigit(),
            'user_id' => User::InRandomOrder()->first(),
        ];
    }
}
