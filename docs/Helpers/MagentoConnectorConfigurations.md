Helper class for `\MyPromo\Connect\SDK\Repositories\Client\ClientConnectorRepository::all()`

```php
$configurations = new \MyPromo\Connect\SDK\Helpers\MagentoConnectorConfigurations();
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
```

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md