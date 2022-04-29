Helper class for `\MyPromo\Connect\SDK\Repositories\Client\ClientConnectorRepository::update()`

```php
$shopifyConfigurations = new \MyPromo\Connect\SDK\Helpers\ConnectorConfigurationsShopify();
$shopifyConfigurations->setShopName('Shop Name');
$shopifyConfigurations->setShopUrl('Shop Url');
$shopifyConfigurations->setToken('Shop Token');
$shopifyConfigurations->setShopCurrency('EUR');
$shopifyConfigurations->setProductsLanguage('DE');
$shopifyConfigurations->setSyncProductSettings('normal');
$shopifyConfigurations->setSalePriceConfig('use_sales_price');
$shopifyConfigurations->setCreateCollections(true|false);
$shopifyConfigurations->setUpdateImages(true|false);
$shopifyConfigurations->setUpdateProducts(true|false);
$shopifyConfigurations->setUpdateSeo(true|false);
$shopifyConfigurations->setRecreateDeletedCollection(true|false);
$shopifyConfigurations->setRecreateDeletedProducts(true|false);
```

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md