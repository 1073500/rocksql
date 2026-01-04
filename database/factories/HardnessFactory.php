<?php

namespace Database\Factories;

use App\Models\Hardness;
use Illuminate\Database\Eloquent\Factories\Factory;

class HardnessFactory extends Factory
{
    protected $model = Hardness::class;

    public function definition(): array
    {
        return [
            'hardness' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
