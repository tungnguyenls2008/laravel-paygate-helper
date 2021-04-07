<?php namespace Tests\Repositories;

use App\Models\MerchantOrderResult;
use App\Repositories\MerchantOrderResultRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MerchantOrderResultRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MerchantOrderResultRepository
     */
    protected $merchantOrderResultRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->merchantOrderResultRepo = \App::make(MerchantOrderResultRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->make()->toArray();

        $createdMerchantOrderResult = $this->merchantOrderResultRepo->create($merchantOrderResult);

        $createdMerchantOrderResult = $createdMerchantOrderResult->toArray();
        $this->assertArrayHasKey('id', $createdMerchantOrderResult);
        $this->assertNotNull($createdMerchantOrderResult['id'], 'Created MerchantOrderResult must have id specified');
        $this->assertNotNull(MerchantOrderResult::find($createdMerchantOrderResult['id']), 'MerchantOrderResult with given id must be in DB');
        $this->assertModelData($merchantOrderResult, $createdMerchantOrderResult);
    }

    /**
     * @test read
     */
    public function test_read_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();

        $dbMerchantOrderResult = $this->merchantOrderResultRepo->find($merchantOrderResult->id);

        $dbMerchantOrderResult = $dbMerchantOrderResult->toArray();
        $this->assertModelData($merchantOrderResult->toArray(), $dbMerchantOrderResult);
    }

    /**
     * @test update
     */
    public function test_update_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();
        $fakeMerchantOrderResult = MerchantOrderResult::factory()->make()->toArray();

        $updatedMerchantOrderResult = $this->merchantOrderResultRepo->update($fakeMerchantOrderResult, $merchantOrderResult->id);

        $this->assertModelData($fakeMerchantOrderResult, $updatedMerchantOrderResult->toArray());
        $dbMerchantOrderResult = $this->merchantOrderResultRepo->find($merchantOrderResult->id);
        $this->assertModelData($fakeMerchantOrderResult, $dbMerchantOrderResult->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_merchant_order_result()
    {
        $merchantOrderResult = MerchantOrderResult::factory()->create();

        $resp = $this->merchantOrderResultRepo->delete($merchantOrderResult->id);

        $this->assertTrue($resp);
        $this->assertNull(MerchantOrderResult::find($merchantOrderResult->id), 'MerchantOrderResult should not exist in DB');
    }
}
