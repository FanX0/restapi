<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Variantion;

class VariantionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variantion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'picture' => Picture::factory(),
            'attribute_1' => $this->faker->word(),
            'attribute_2' => $this->faker->word(),
            'price' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
