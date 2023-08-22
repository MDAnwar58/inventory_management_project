<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total' => '10000',
            'discount' => '1000',
            'vat' => '1000',
            'payable' => '9000',
            'user_id' => '1',
            'customer_id' => '1',
        ];
    }
}
