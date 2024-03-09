<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

          // Generate a random number between 1 and 1000 for picture ID
    $pictureId = $this->faker->numberBetween(1, 1000);

    // Construct a random URL for the picture using Lorem Picsum service
    $pictureUrl = "https://picsum.photos/id/{$pictureId}/200/300";
        return [
            'category_id' => Category::factory(),
            'picture' => $pictureUrl, // Set the picture attribute to the generated URL
            'name' => $name = $this->faker->name(),
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->text(),
        ];
    }
}
