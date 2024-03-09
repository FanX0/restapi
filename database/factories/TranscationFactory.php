<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Transcation;
use App\Models\User;

class TranscationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transcation::class;

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
            'merchant_id' => $this->faker->word(),
            'payment_method' => $this->faker->word(),
            'status_message' => $this->faker->word(),
            'transaction_id' => $this->faker->word(),
            'transaction_status' => $this->faker->word(),
            'transaction_time' => $this->faker->dateTime(),
            'settlement_time' => $this->faker->dateTime(),
            'expiry_time' => $this->faker->dateTime(),
            'fraud_status' => $this->faker->word(),
            'order_status' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
