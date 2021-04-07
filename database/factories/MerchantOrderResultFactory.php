<?php

namespace Database\Factories;

use App\Models\MerchantOrderResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantOrderResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MerchantOrderResult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'input' => $this->faker->word,
        'result_code' => $this->faker->word,
        'checkout_url' => $this->faker->word,
        'token_code' => $this->faker->word,
        'result_message' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
