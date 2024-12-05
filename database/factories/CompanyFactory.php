<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        [
            'company_id' => (string) Str::uuid(),
            'name' => $this->faker->company,
            'rating' => $this->faker->randomFloat(2, 0, 5),
            'logo' => $this->faker->imageUrl(100, 100, 'business', true, 'logo'),
            'shortcode' => strtoupper($this->faker->unique()->lexify('?????')),
        ];
    }
}
