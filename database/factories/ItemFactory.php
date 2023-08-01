<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id'      => 1,
            'category_id'  => 1,
            'unit_id'      => 1,
            'name'         => $this->faker->name(),
            'barcode'      => $this->faker->numberBetween(),
            'desc'         => $this->faker->text(),
            'image'        => '',
            'min'          => 10,
            'sale_price'   => rand(1, 10),
            'pay_price'    => rand(1, 10),
            'is_active'    => 1,
        ];
    }
}
