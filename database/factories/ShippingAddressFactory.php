<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shipping_address;
use App\Models\User;

class ShippingAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingAddress::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'address1' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'is_default' => $this->faker->word(),
        ];
    }
}
