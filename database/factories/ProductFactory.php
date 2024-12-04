<?php

namespace Database\Factories;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name,
            'description'=>$this->faker->text,
            'price'=>$this->faker->numerify,
            'state_id'=>1,
            'brand'=>$this->faker->name,
            'amount'=>$this->faker->numerify,
            'sku'=>$this->faker->text
        ];
    }
}
