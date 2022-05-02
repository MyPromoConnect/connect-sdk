Options for magento to set client connector [ClientConnectorRepository->update()][ClientConnectorRepository]

```php
$clientConnectorConfigurationMagento = new \MyPromo\Connect\SDK\Models\ClientConnectorConfigurationMagento();
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
```

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md
