Helper class for `\MyPromo\Connect\SDK\Repositories\Client\ClientConnectorRepository::all()`

```php
$configurations = new \MyPromo\Connect\SDK\Helpers\ShopifyConnectorConfigurations();
$configurations->setShopName('Shop Name');
$configurations->setShopUrl('Shop Url');
$configurations->setToken('Shop Token');
$configurations->setShopCurrency('EUR');
$configurations->setProductsLanguage('DE');
$configurations->getSyncProductSettings('normal');
$configurations->setSalePriceConfig('use_sales_price');
$configurations->setCreateCollections('true|false');
$configurations->setUpdateImages('true|false');
$configurations->setUpdateProducts('true|false');
$configurations->setUpdateSeo('true|false');
$configurations->setRecreateDeletedCollection('true|false');
$configurations->setRecreateDeletedProducts('true|false');
```

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md