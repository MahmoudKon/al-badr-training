<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shop;
use App\Models\Unit;
use App\Models\Category;

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
    {//'name','description','price','is_active','shop_id','unit_id','category_id'
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text($maxNbChars = 100),
            'price' => $this->faker->randomNumber(2),
            'is_active' => true,
            'shop_id'  => Shop::select('id')->inRandomOrder()->first()->id,
            'unit_id' => Unit::select('id')->inRandomOrder()->frist()->id,
            'category_id' => Category::select('id')->inRandomOrder()->frist()->id,
        ];
    }
}
