<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MerchantOrder;

class MerchantOrderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/merchant_orders', $merchantOrder
        );

        $this->assertApiResponse($merchantOrder);
    }

    /**
     * @test
     */
    public function test_read_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/merchant_orders/'.$merchantOrder->id
        );

        $this->assertApiResponse($merchantOrder->toArray());
    }

    /**
     * @test
     */
    public function test_update_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();
        $editedMerchantOrder = MerchantOrder::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/merchant_orders/'.$merchantOrder->id,
            $editedMerchantOrder
        );

        $this->assertApiResponse($editedMerchantOrder);
    }

    /**
     * @test
     */
    public function test_delete_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/merchant_orders/'.$merchantOrder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/merchant_orders/'.$merchantOrder->id
        );

        $this->response->assertStatus(404);
    }
}
