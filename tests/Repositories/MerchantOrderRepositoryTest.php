<?php namespace Tests\Repositories;

use App\Models\MerchantOrder;
use App\Repositories\MerchantOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MerchantOrderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MerchantOrderRepository
     */
    protected $merchantOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->merchantOrderRepo = \App::make(MerchantOrderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->make()->toArray();

        $createdMerchantOrder = $this->merchantOrderRepo->create($merchantOrder);

        $createdMerchantOrder = $createdMerchantOrder->toArray();
        $this->assertArrayHasKey('id', $createdMerchantOrder);
        $this->assertNotNull($createdMerchantOrder['id'], 'Created MerchantOrder must have id specified');
        $this->assertNotNull(MerchantOrder::find($createdMerchantOrder['id']), 'MerchantOrder with given id must be in DB');
        $this->assertModelData($merchantOrder, $createdMerchantOrder);
    }

    /**
     * @test read
     */
    public function test_read_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();

        $dbMerchantOrder = $this->merchantOrderRepo->find($merchantOrder->id);

        $dbMerchantOrder = $dbMerchantOrder->toArray();
        $this->assertModelData($merchantOrder->toArray(), $dbMerchantOrder);
    }

    /**
     * @test update
     */
    public function test_update_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();
        $fakeMerchantOrder = MerchantOrder::factory()->make()->toArray();

        $updatedMerchantOrder = $this->merchantOrderRepo->update($fakeMerchantOrder, $merchantOrder->id);

        $this->assertModelData($fakeMerchantOrder, $updatedMerchantOrder->toArray());
        $dbMerchantOrder = $this->merchantOrderRepo->find($merchantOrder->id);
        $this->assertModelData($fakeMerchantOrder, $dbMerchantOrder->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_merchant_order()
    {
        $merchantOrder = MerchantOrder::factory()->create();

        $resp = $this->merchantOrderRepo->delete($merchantOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(MerchantOrder::find($merchantOrder->id), 'MerchantOrder should not exist in DB');
    }
}
