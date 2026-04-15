<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->firstName(),
            'surname'=>$this->faker->lastName(),
            'email'=>$this->faker->unique()->safeEmail(),
            'birthdate'=>$this->faker->date(),
            'phone'=>$this->faker->phoneNumber()
        ];
    }
}
