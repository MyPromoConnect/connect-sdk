<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Client;
use MyPromo\Connect\SDK\Exceptions\InputValidationException;
use MyPromo\Connect\SDK\Models\Customs;
use MyPromo\Connect\SDK\Models\File;
use MyPromo\Connect\SDK\Models\OrderItem;
use MyPromo\Connect\SDK\Repositories\Orders\OrderItemRepository;
use PHPUnit\Framework\TestCase;

class OrderItemTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var OrderItem
     */
    private $orderItem;

    /**
     * @var OrderItemRepository
     */
    private $orderItemRepository;

    /**
     * @var Customs
     */
    private $custom;

    /**
     * @var File
     */
    private $file;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client(false, 1, 'TEST123');

        $this->orderItem           = new OrderItem();
        $this->orderItemRepository = new OrderItemRepository($this->client);

        $this->file = new File();
        $this->file->setUrl('https://example.com');
        $this->file->setType('front');

        $this->custom = new Customs();

        $this->orderItem->setCustoms($this->custom);
        $this->orderItem->setQuantity(15);
        $this->orderItem->setFiles($this->file);
    }

    public function testValuesShouldEqualNull()
    {
        $this->assertEquals(
            null,
            $this->orderItem->getReference()
        );

        $this->assertEquals(
            $this->custom,
            $this->orderItem->getCustoms()
        );

        $this->assertEquals(
            null,
            $this->orderItem->getOrderId()
        );

        $this->assertEquals(
            15,
            $this->orderItem->getQuantity()
        );

        $this->assertIsInt($this->orderItem->getQuantity());

        $this->assertEquals(
            null,
            $this->orderItem->getSku()
        );
    }

    public function testCannotBeSubmittedWithoutOrderId()
    {
        $this->expectException(InputValidationException::class);

        $orderItem = new OrderItem();

        $this->orderItemRepository->submit($orderItem);
    }

    public function testFilledCustomsAnArray()
    {
        $customArray = $this->orderItem->getCustoms()->toArray();

        $this->assertIsArray($customArray);

        $this->assertArrayHasKey('description', $customArray);
        $this->assertArrayHasKey('number', $customArray);
        $this->assertArrayHasKey('origin', $customArray);
        $this->assertArrayHasKey('currency', $customArray);
        $this->assertArrayHasKey('amount', $customArray);

        $this->assertCount(5, $customArray);
    }

    public function testOrderItemArrayInterface()
    {
        $this->assertIsArray($this->orderItem->toArray());
        $this->assertArrayHasKey('reference', $this->orderItem->toArray());
        $this->assertArrayHasKey('quantity', $this->orderItem->toArray());
        $this->assertArrayHasKey('sku', $this->orderItem->toArray());
        $this->assertArrayHasKey('files', $this->orderItem->toArray());
        $this->assertArrayHasKey('customs', $this->orderItem->toArray());
    }
}
