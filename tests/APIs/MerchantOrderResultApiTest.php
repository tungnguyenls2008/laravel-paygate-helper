<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MerchantOrderResult;

class MerchantOrderResultApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/merchant_order_results', $merchantOrderResult
        );

        $this->assertApiResponse($merchantOrderResult);
    }

    /**
     * @test
     */
    public function test_read_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/merchant_order_results/'.$merchantOrderResult->id
        );

        $this->assertApiResponse($merchantOrderResult->toArray());
    }

    /**
     * @test
     */
    public function test_update_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();
        $editedMerchantOrderResult = MerchantOrderResult::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/merchant_order_results/'.$merchantOrderResult->id,
            $editedMerchantOrderResult
        );

        $this->assertApiResponse($editedMerchantOrderResult);
    }

    /**
     * @test
     */
    public function test_delete_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/merchant_order_results/'.$merchantOrderResult->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/merchant_order_results/'.$merchantOrderResult->id
        );

        $this->response->assertStatus(404);
    }
}
