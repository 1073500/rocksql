<?php

namespace Database\Factories;

use App\Models\Continent;
use App\Models\Rock;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RockFactory extends Factory
{
    protected $model = Rock::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'type_id' => $this->faker->word(),
            'color_id' => $this->faker->word(),
            'hardness_id' => $this->faker->word(),
            'category_id' => $this->faker->word(),
            'description' => $this->faker->text(),

            'user_id' => User::factory(),
            'continent_id' => Continent::factory(),
        ];
    }
}
