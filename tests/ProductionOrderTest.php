<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Helpers\ProductionOrderOptions;
use MyPromo\Connect\SDK\Models\Shipment;
use PHPUnit\Framework\TestCase;

class ProductionOrderTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    /**
     * @var Shipment
     */
    protected $shipment;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new ProductionOrderOptions();
        $this->options->setFrom(1);
        $this->options->setPerPage(5);

        $this->shipment = new Shipment();
        $this->shipment->setCarrier('UPS');
        $this->shipment->setTrackingId('1Z123891378113');
        $this->shipment->setHeight('30');
        $this->shipment->setWidth('45');
        $this->shipment->setDepth('20');
        $this->shipment->setWeight('1000');
        $this->shipment->setProductionOrderItems([
            ['id' => 176, 'quantity' => 5]
        ]);
        $this->shipment->setForce(false);
    }

    public function testOptions()
    {
        $this->assertIsArray($this->options->toArray());
    }

    public function testShipment()
    {
        $this->assertIsArray($this->shipment->toArray());
        $this->assertArrayHasKey('carrier', $this->shipment->toArray());
        $this->assertArrayHasKey('tracking_id', $this->shipment->toArray());
        $this->assertArrayHasKey('height', $this->shipment->toArray());
        $this->assertArrayHasKey('width', $this->shipment->toArray());
        $this->assertArrayHasKey('depth', $this->shipment->toArray());
        $this->assertArrayHasKey('weight', $this->shipment->toArray());
        $this->assertArrayHasKey('production_order_items', $this->shipment->toArray());
        $this->assertArrayHasKey('force', $this->shipment->toArray());
    }
}
