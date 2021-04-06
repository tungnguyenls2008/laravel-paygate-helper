<?php

namespace Database\Factories;

use App\Models\MerchantOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MerchantOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'merchant_site_code' => $this->faker->word,
        'merchant_key' => $this->faker->word,
        'order_code' => $this->faker->word,
        'method_code' => $this->faker->word,
        'bank_code' => $this->faker->word,
        'order_description' => $this->faker->word,
        'amount' => $this->faker->randomDigitNotNull,
        'currency' => $this->faker->word,
        'language' => $this->faker->word,
        'buyer_fullname' => $this->faker->word,
        'buyer_email' => $this->faker->word,
        'buyer_mobile' => $this->faker->word,
        'buyer_address' => $this->faker->word,
        'time_limit' => $this->faker->randomDigitNotNull,
        'return_url' => $this->faker->word,
        'cancel_url' => $this->faker->word,
        'notify_url' => $this->faker->word
        ];
    }
}
