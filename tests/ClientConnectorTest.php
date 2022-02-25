<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Models\ClientConnector;
use PHPUnit\Framework\TestCase;

class ClientConnectorTest extends TestCase
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
        $clientConnector = new ClientConnector();

        $clientConnector->setConnectorId(14);
        $clientConnector->setConnectorKey('shopify');
        $clientConnector->setTarget('sales_channel');

        $this->assertIsInt($clientConnector->getConnectorId());
        $this->assertIsString($clientConnector->getConnectorKey());
        $this->assertIsString($clientConnector->getTarget());

        # For magento connector
        $configurations = new \MyPromo\Connect\SDK\Helpers\ConnectorConfigurationsMagento();
        $configurations->setInstanceUrl('url');
        $configurations->setApiUsername('username');
        $configurations->setApiPassword('password');
        $configurations->setWebsiteCode('XXXX');
        $configurations->setWebsiteCodeId(1);
        $configurations->setWebsiteCodeName('Website name');
        $configurations->setStoreCode('XXXXX');
        $configurations->setStoreCodeId(1);
        $configurations->setStoreCodeName('Store code');
        $configurations->setSyncProductsSettings('normal');
        $configurations->setSalesPriceConfig('use_sales_price');

        $this->assertIsInt($configurations->getWebsiteCodeId());
        $this->assertIsInt($configurations->getStoreCodeId());

        $this->assertIsString($configurations->getSalesPriceConfig());
        $this->assertIsString($configurations->getSyncProductsSettings());
        $this->assertIsString($configurations->getStoreCodeName());
        $this->assertIsString($configurations->getStoreCode());
        $this->assertIsString($configurations->getWebsiteCodeName());
        $this->assertIsString($configurations->getWebsiteCode());
        $this->assertIsString($configurations->getApiPassword());
        $this->assertIsString($configurations->getApiUsername());
        $this->assertIsString($configurations->getInstanceUrl());

        $this->assertIsArray($configurations->toArray());

        $clientConnector->setConfiguration($configurations->toArray());

        # For shopify connector
        $shopifyConfigurations = new \MyPromo\Connect\SDK\Helpers\ConnectorConfigurationsShopify();
        $shopifyConfigurations->setShopName('Shop Name');
        $shopifyConfigurations->setShopUrl('Shop Url');
        $shopifyConfigurations->setToken('Shop Token');
        $shopifyConfigurations->setShopCurrency('EUR');
        $shopifyConfigurations->setProductsLanguage('DE');
        $shopifyConfigurations->setSyncProductSettings('normal');
        $shopifyConfigurations->setSalePriceConfig('use_sales_price');
        $shopifyConfigurations->setCreateCollections(true);
        $shopifyConfigurations->setUpdateImages(true);
        $shopifyConfigurations->setUpdateProducts(false);
        $shopifyConfigurations->setUpdateSeo(false);
        $shopifyConfigurations->setRecreateDeletedCollection(false);
        $shopifyConfigurations->setRecreateDeletedProducts(false);

        $this->assertIsString($shopifyConfigurations->getShopName());
        $this->assertIsString($shopifyConfigurations->getShopUrl());
        $this->assertIsString($shopifyConfigurations->getToken());
        $this->assertIsString($shopifyConfigurations->getShopCurrency());
        $this->assertIsString($shopifyConfigurations->getProductsLanguage());
        $this->assertIsString($shopifyConfigurations->getSyncProductSettings());
        $this->assertIsString($shopifyConfigurations->getSalePriceConfig());

        $this->assertIsBool($shopifyConfigurations->getCreateCollections());
        $this->assertIsBool($shopifyConfigurations->getUpdateImages());
        $this->assertIsBool($shopifyConfigurations->getUpdateProducts());
        $this->assertIsBool($shopifyConfigurations->getUpdateSeo());
        $this->assertIsBool($shopifyConfigurations->getRecreateDeletedCollection());
        $this->assertIsBool($shopifyConfigurations->getRecreateDeletedProducts());

        $this->assertIsArray($shopifyConfigurations->toArray());

        $clientConnector->setConfiguration($shopifyConfigurations->toArray());

        $this->assertIsArray($clientConnector->toArray());
    }
}
