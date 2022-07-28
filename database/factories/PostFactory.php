<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->sentence,
            'post_text'    => $this->faker->text(1000),
            'post_url'     => $this->faker->url,
            'user_id'      => $this->faker->numberBetween(1, 200),
            'community_id' => $this->faker->numberBetween(1, 5),
            'created_at'   => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at'   => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }

}
