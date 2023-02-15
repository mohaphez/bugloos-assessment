<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceLog>
 */
class ServiceLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_name' => 'order-service',
            'status_code' => collect([201, 200, 400, 422])->random(),
            'service_log' => fake()->realText(),
            'date' => now(),
        ];
    }
}