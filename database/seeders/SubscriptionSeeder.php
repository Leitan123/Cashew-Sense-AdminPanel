<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subscription::updateOrCreate(['name' => 'Free Subscription'], ['limit' => 10]);
        \App\Models\Subscription::updateOrCreate(['name' => 'Standard Subscription'], ['limit' => 100]);
        \App\Models\Subscription::updateOrCreate(['name' => 'Premium Subscription'], ['limit' => 500]);
    }
}
