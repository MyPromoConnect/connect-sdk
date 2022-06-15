Options for shopify to set client connector [ClientConnectorRepository->update()][ClientConnectorRepository]

```php
$clientConnectorConfigurationShopify = new \MyPromo\Connect\SDK\Models\Client\ConnectorConfigurationShopify();
$clientConnectorConfigurationShopify->setShopName('Shop Name');
$clientConnectorConfigurationShopify->setShopUrl('Shop Url');
$clientConnectorConfigurationShopify->setToken('Shop Token');
$clientConnectorConfigurationShopify->setShopCurrency('EUR');
$clientConnectorConfigurationShopify->setProductsLanguage('DE');
$clientConnectorConfigurationShopify->setSyncProductSettings('normal');
$clientConnectorConfigurationShopify->setSalePriceConfig('use_sales_price');
$clientConnectorConfigurationShopify->setCreateCollections(true|false);
$clientConnectorConfigurationShopify->setUpdateImages(true|false);
$clientConnectorConfigurationShopify->setUpdateProducts(true|false);
$clientConnectorConfigurationShopify->setUpdateSeo(true|false);
$clientConnectorConfigurationShopify->setRecreateDeletedCollection(true|false);
$clientConnectorConfigurationShopify->setRecreateDeletedProducts(true|false);
```

[ClientConnectorRepository]: ../../Repositories/Client/ClientConnectorRepository.md