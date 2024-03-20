<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pt' => 1100,
            'pt_value' => 31.10,
            'pt_per' => 90,
            'pd' => 959,
            'pd_value' => 31.10,
            'pd_per' => 90,
            'rh' => 5000,
            'rh_value' => 31.10,
            'rh_per' => 90,
            'exchange_rate' => 3.67,
            'minus_val' => 0,
        ];
    }
}
