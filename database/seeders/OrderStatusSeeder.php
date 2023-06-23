<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cases = [
            'new',
            'in_process',
            'pending',
            'shipped',
            'delivered',
            'cancelled',
        ];

        foreach ($cases as $case) {
            if (is_null(OrderStatus::where('name', $case)->first()))
                OrderStatus::create(['name' => $case]);
        }
    }
}
