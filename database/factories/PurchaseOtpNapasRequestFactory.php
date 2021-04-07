<?php

namespace Database\Factories;

use App\Models\PurchaseOtpNapasRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOtpNapasRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseOtpNapasRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => $this->faker->word,
        'order_id' => $this->faker->word,
        'api_operation' => $this->faker->word,
        'order_amount' => $this->faker->randomDigitNotNull,
        'order_currency' => $this->faker->word,
        'order_reference' => $this->faker->word,
        'fund_type' => $this->faker->word,
        'card_number' => $this->faker->word,
        'issue_date' => $this->faker->word,
        'name_on_card' => $this->faker->word,
        'channel' => $this->faker->word,
        'client_ip' => $this->faker->word,
        'device_id' => $this->faker->word,
        'environment' => $this->faker->word,
        'card_scheme' => $this->faker->word,
        'enable_3d_secure' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
