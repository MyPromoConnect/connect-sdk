<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Models\ClientSettingFulfiller;
use MyPromo\Connect\SDK\Models\ClientSettingMerchant;
use PHPUnit\Framework\TestCase;

class ClientSettingTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testPayload()
    {
        // Merchant client test
        $merchantClientSettings = new ClientSettingFulfiller();
        $merchantClientSettings->setHasToSupplyCarrier(true);
        $merchantClientSettings->setHasToSupplyTrackingCode(true);

        $this->assertIsBool($merchantClientSettings->getHasToSupplyCarrier());
        $this->assertIsBool($merchantClientSettings->getHasToSupplyTrackingCode());

        $this->assertIsArray($merchantClientSettings->toArray());

        // Fulfiller client test
        $fulfillerClientSettings = new ClientSettingMerchant();
        $fulfillerClientSettings->setActivateNewFulfiller(true);
        $fulfillerClientSettings->setActivateNewProducts(false);
        $fulfillerClientSettings->setHasToSupplyCarrier(true);
        $fulfillerClientSettings->setHasToSupplyTrackingCode(true);
        $fulfillerClientSettings->setPriceResetLogic(1);
        $fulfillerClientSettings->setAdjustMaxUpPercentage(0);
        $fulfillerClientSettings->setAdjustMaxDownPercentage(0);
        $fulfillerClientSettings->setSentToProductionDelay(1);

        $this->assertIsBool($fulfillerClientSettings->getActivateNewFulfiller());
        $this->assertIsBool($fulfillerClientSettings->getActivateNewProducts());
        $this->assertIsBool($fulfillerClientSettings->getHasToSupplyCarrier());
        $this->assertIsBool($fulfillerClientSettings->getHasToSupplyTrackingCode());

        $this->assertIsInt($fulfillerClientSettings->getPriceResetLogic());
        $this->assertIsInt($fulfillerClientSettings->getAdjustMaxUpPercentage());
        $this->assertIsInt($fulfillerClientSettings->getAdjustMaxDownPercentage());
        $this->assertIsInt($fulfillerClientSettings->getSentToProductionDelay());

        $this->assertIsArray($fulfillerClientSettings->toArray());
    }
}
