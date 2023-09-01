<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */

//  use Illuminate\Database\Eloquent\Factories\Factory;


class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Hip Hop', 'Afrobeat', 'Rock']),
        ];
    }
}