<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contract_number' => $this->faker->unique()->numerify('CN###'),
            'warehouse_id' => Warehouse::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'entire_price_per' => $this->faker->randomFloat(2, 1, 1000),
            'entire_price_all' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['entire_price_per'];
            },
            'barcode' => $this->faker->unique()->ean13(),
        ];
    }
}
