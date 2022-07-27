<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommunityFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(30);

        return [
            'name'        => $name,
            'user_id'     => $this->faker->numberBetween(1, 200),
            'slug'        => Str::slug($name),
            'description' => $this->faker->text(200),
            'created_at'  => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at'  => $this->faker->dateTimeBetween('-1 years', 'now'),

        ];
    }

}
