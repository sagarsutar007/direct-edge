<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Company;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'company_id' => (string) Str::uuid(),
            'name' => 'Rourkela Institute of Management Studies',
            'rating' => 0.0,
            'logo' => 'rims.png',
            'shortcode' => 'RIMS',
        ]);

        Company::create([
            'company_id' => (string) Str::uuid(),
            'name' => 'Steel Authority of India Limited',
            'rating' => 0.0,
            'logo' => 'sail.png',
            'shortcode' => 'SAIL',
        ]);
    }
}
