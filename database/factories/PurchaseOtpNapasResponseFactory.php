<?php

namespace Database\Factories;

use App\Models\PurchaseOtpNapasResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOtpNapasResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseOtpNapasResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->word,
        'error_code' => $this->faker->word,
        'error_data' => $this->faker->word,
        'order_amount' => $this->faker->randomDigitNotNull,
        'order_currency' => $this->faker->word,
        'order_trans_time' => $this->faker->date('Y-m-d H:i:s'),
        'order_trans_id' => $this->faker->word,
        'response_message' => $this->faker->word,
        'response_acquirer_code' => $this->faker->randomDigitNotNull,
        'response_trans_status' => $this->faker->word,
        'source_of_fund_type' => $this->faker->word,
        'source_of_fund_provided_card_brand' => $this->faker->word,
        'source_of_fund_provided_card_scheme' => $this->faker->word,
        'source_of_fund_provided_card_name_on_card' => $this->faker->word,
        'source_of_fund_provided_card_issue_date' => $this->faker->word,
        'source_of_fund_provided_card_number' => $this->faker->word,
        'transaction_acquirer_id' => $this->faker->word,
        'transaction_acquirer_napas_trans_id' => $this->faker->word,
        'transaction_amount' => $this->faker->randomDigitNotNull,
        'transaction_currency' => $this->faker->word,
        'transaction_type' => $this->faker->word,
        'transaction_id' => $this->faker->word,
        'channel' => $this->faker->word,
        'version' => $this->faker->word,
        'data_key' => $this->faker->word,
        'napas_key' => $this->faker->word,
        'api_operation' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
