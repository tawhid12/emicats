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
        $numYears = 3; // Change this to the number of years you want

        $years = [];
        for ($i = 0; $i < $numYears; $i++) {
            $years[] = fake()->numberBetween(1970, 2024);
        }
        return [
            "title" => fake()->word(),
            "ref" => fake()->word(),
            "ref1" => fake()->word(),
            "ref2" => fake()->word(),
            "description" => fake()->paragraph(1),
            "years" => implode(',', $years),
            "manufacturer_id" => Manufacturer::factory(),
            //"price" => fake()->numberBetween(100, 1000),
            "weight" => 100,
            "pt" => fake()->numberBetween(0, 2000),
            "pd" => fake()->numberBetween(0, 2000),
            "rh" => fake()->numberBetween(0, 2000),
            "status" => Status::DRAFT,
        ];
    }
}
