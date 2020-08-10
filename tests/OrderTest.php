<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Models\Address;
use MyPromo\Connect\SDK\Models\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @var Address
     */
    private $shipper;

    /**
     * @var Address
     */
    private $export;

    /**
     * @var Address
     */
    private $recipient;

    /**
     * @var Order
     */
    private $order;

    protected function setUp(): void
    {
        parent::setUp();

        $this->shipper = new Address();
        $this->shipper->setReference('SDK-Shipper-Ref');
        $this->shipper->setCompany('Sample Company');
        $this->shipper->setFirstname('Sam');
        $this->shipper->setLastname('Sample');
        $this->shipper->setStreet('Sample Street 1');
        $this->shipper->setCareOf('Street Add');
        $this->shipper->setZip(12345);
        $this->shipper->setCity('Sample Town');
        $this->shipper->setStateCode('NW');
        $this->shipper->setDistrict('District');
        $this->shipper->setCountryCode('DE');
        $this->shipper->setPhone('+4991234567890');
        $this->shipper->setEmail('sam@sample.com');
        $this->shipper->setCommercialRegisterEntry('Test123');

        $this->recipient = new Address();
        $this->recipient->setReference('SDK-Shipper-Ref');
        $this->recipient->setCompany('Sample Company');
        $this->recipient->setFirstname('Sam');
        $this->recipient->setLastname('Sample');
        $this->recipient->setStreet('Sample Street 1');
        $this->recipient->setCareOf('Street Add');
        $this->recipient->setZip(12345);
        $this->recipient->setCity('Sample Town');
        $this->recipient->setStateCode('NW');
        $this->recipient->setDistrict('District');
        $this->recipient->setCountryCode('DE');
        $this->recipient->setPhone('+4991234567890');
        $this->recipient->setEmail('sam@sample.com');
        $this->recipient->setCommercialRegisterEntry('Test123');

        $this->invoice = new Address();
        $this->invoice->setReference('SDK-Shipper-Ref');
        $this->invoice->setCompany('Sample Company');
        $this->invoice->setFirstname('Sam');
        $this->invoice->setLastname('Sample');
        $this->invoice->setStreet('Sample Street 1');
        $this->invoice->setCareOf('Street Add');
        $this->invoice->setZip(12345);
        $this->invoice->setCity('Sample Town');
        $this->invoice->setStateCode('NW');
        $this->invoice->setDistrict('District');
        $this->invoice->setCountryCode('DE');
        $this->invoice->setPhone('+4991234567890');
        $this->invoice->setEmail('sam@sample.com');
        $this->invoice->setCommercialRegisterEntry('Test123');
        $this->invoice->setIban('DE89370400440532013000');
        $this->invoice->setBicOrSwift('WELADED1SIE');
        $this->invoice->setAccountHolder('Sam Sample');

        $this->order = new Order();
        $this->order->setReference('SDK-Reference-1');
        $this->order->setShipper($this->shipper);
        $this->order->setRecipient($this->recipient);
        $this->order->setExport($this->export);
    }

    public function testOrderDefaults()
    {
        $this->assertFalse($this->order->isComplaint());
        $this->assertFalse($this->order->isExpressProduction());
        $this->assertFalse($this->order->isExpressShipping());

        $this->assertInstanceOf(Address::class, $this->order->getShipper());
        $this->assertInstanceOf(Address::class, $this->order->getRecipient());
        $this->assertInstanceOf(Address::class, $this->order->getInvoice());
    }

    public function testAddresses()
    {
        $this->assertIsString($this->shipper->getReference());
        $this->assertIsString($this->invoice->getReference());
        $this->assertIsString($this->recipient->getReference());
    }

    public function testOrderArrayInterface()
    {
        $this->assertIsArray($this->order->toArray());
        $this->assertArrayHasKey('reference', $this->order->toArray());
        $this->assertArrayHasKey('complaint', $this->order->toArray());
        $this->assertArrayHasKey('express_production', $this->order->toArray());
        $this->assertArrayHasKey('express_shipping', $this->order->toArray());
        $this->assertArrayHasKey('shipper', $this->order->toArray());
        $this->assertArrayHasKey('recipient', $this->order->toArray());
        $this->assertArrayHasKey('invoice', $this->order->toArray());
    }
}
