<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Constants\Status;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->word(),
            "ref" => fake()->word(),
            "ref1" => fake()->word(),
            "ref2" => fake()->word(),
            "description" => fake()->paragraph(1),
            "manufacturer_id" => Manufacturer::factory(),
            //"price" => fake()->numberBetween(100, 1000),
            "weight" => 100,
            "status" => Status::DRAFT,
        ];
    }
}
