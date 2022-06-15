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
        $clientConnectorConfigurationMagento = new \MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationMagento();
        $clientConnectorConfigurationMagento->setInstanceUrl('url');
        $clientConnectorConfigurationMagento->setApiUsername('username');
        $clientConnectorConfigurationMagento->setApiPassword('password');
        $clientConnectorConfigurationMagento->setWebsiteCode('XXXX');
        $clientConnectorConfigurationMagento->setWebsiteCodeId(1);
        $clientConnectorConfigurationMagento->setWebsiteCodeName('Website name');
        $clientConnectorConfigurationMagento->setStoreCode('XXXXX');
        $clientConnectorConfigurationMagento->setStoreCodeId(1);
        $clientConnectorConfigurationMagento->setStoreCodeName('Store code');
        $clientConnectorConfigurationMagento->setSyncProductsSettings('normal');
        $clientConnectorConfigurationMagento->setSalesPriceConfig('use_sales_price');

        $this->assertIsInt($clientConnectorConfigurationMagento->getWebsiteCodeId());
        $this->assertIsInt($clientConnectorConfigurationMagento->getStoreCodeId());

        $this->assertIsString($clientConnectorConfigurationMagento->getSalesPriceConfig());
        $this->assertIsString($clientConnectorConfigurationMagento->getSyncProductsSettings());
        $this->assertIsString($clientConnectorConfigurationMagento->getStoreCodeName());
        $this->assertIsString($clientConnectorConfigurationMagento->getStoreCode());
        $this->assertIsString($clientConnectorConfigurationMagento->getWebsiteCodeName());
        $this->assertIsString($clientConnectorConfigurationMagento->getWebsiteCode());
        $this->assertIsString($clientConnectorConfigurationMagento->getApiPassword());
        $this->assertIsString($clientConnectorConfigurationMagento->getApiUsername());
        $this->assertIsString($clientConnectorConfigurationMagento->getInstanceUrl());

        $this->assertIsArray($clientConnectorConfigurationMagento->toArray());

        $clientConnector->setConfiguration($clientConnectorConfigurationMagento->toArray());

        # For shopify connector
        $clientConnectorConfigurationShopify = new \MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationShopify();
        $clientConnectorConfigurationShopify->setShopName('Shop Name');
        $clientConnectorConfigurationShopify->setShopUrl('Shop Url');
        $clientConnectorConfigurationShopify->setToken('Shop Token');
        $clientConnectorConfigurationShopify->setShopCurrency('EUR');
        $clientConnectorConfigurationShopify->setProductsLanguage('DE');
        $clientConnectorConfigurationShopify->setSyncProductSettings('normal');
        $clientConnectorConfigurationShopify->setSalePriceConfig('use_sales_price');
        $clientConnectorConfigurationShopify->setCreateCollections(true);
        $clientConnectorConfigurationShopify->setUpdateImages(true);
        $clientConnectorConfigurationShopify->setUpdateProducts(false);
        $clientConnectorConfigurationShopify->setUpdateSeo(false);
        $clientConnectorConfigurationShopify->setRecreateDeletedCollection(false);
        $clientConnectorConfigurationShopify->setRecreateDeletedProducts(false);

        $this->assertIsString($clientConnectorConfigurationShopify->getShopName());
        $this->assertIsString($clientConnectorConfigurationShopify->getShopUrl());
        $this->assertIsString($clientConnectorConfigurationShopify->getToken());
        $this->assertIsString($clientConnectorConfigurationShopify->getShopCurrency());
        $this->assertIsString($clientConnectorConfigurationShopify->getProductsLanguage());
        $this->assertIsString($clientConnectorConfigurationShopify->getSyncProductSettings());
        $this->assertIsString($clientConnectorConfigurationShopify->getSalePriceConfig());

        $this->assertIsBool($clientConnectorConfigurationShopify->getCreateCollections());
        $this->assertIsBool($clientConnectorConfigurationShopify->getUpdateImages());
        $this->assertIsBool($clientConnectorConfigurationShopify->getUpdateProducts());
        $this->assertIsBool($clientConnectorConfigurationShopify->getUpdateSeo());
        $this->assertIsBool($clientConnectorConfigurationShopify->getRecreateDeletedCollection());
        $this->assertIsBool($clientConnectorConfigurationShopify->getRecreateDeletedProducts());

        $this->assertIsArray($clientConnectorConfigurationShopify->toArray());

        $clientConnector->setConfiguration($clientConnectorConfigurationShopify->toArray());

        $this->assertIsArray($clientConnector->toArray());
    }
}
