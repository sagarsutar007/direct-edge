<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company;

class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_post_id' => (string) Str::uuid(),
            'slug' => $this->faker->slug,
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'reference' => $this->faker->word,
            'company_id' => Company::inRandomOrder()->first()->company_id ?? NULL,
            'experience' => $this->faker->randomFloat(2, 0, 10),
            'cost_to_company' => $this->faker->randomFloat(2, 10000, 50000),
            'time_period' => $this->faker->randomElement(['monthly', 'yearly']),
            'currency' => $this->faker->currencyCode,
            'location' => $this->faker->city,
            'vacancy_count' => $this->faker->numberBetween(1, 10),
            'expiry_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['open', 'closed', 'expired']),
            'extra_configs' => [],
        ];
    }
}

