<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Pet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'user_id' => User::factory(),
            'name' => $this->faker->firstName(),
            'old' => $this->faker->numberBetween(0, 25),
            'species' => $this->faker->date(),
            'image' => $this->faker->image(),
        ];
    }
}
