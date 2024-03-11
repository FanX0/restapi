<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\User;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->word(),
            'user_id' => User::factory(),
            'gross_amount' => $this->faker->numberBetween(-10000, 10000),
            'shipping_information' => $this->faker->word(),
        ];
    }
}
