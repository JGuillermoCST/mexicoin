<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adjusment;

class AdjusmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Create categories
        Adjusment::create([
            'name' => 'Stripe',
            'amount' => 0.04,
        ]);
        Adjusment::create([
            'name' => 'Paypal',
            'amount' => 0.06,
        ]);
    }
}