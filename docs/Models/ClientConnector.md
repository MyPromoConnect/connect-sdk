Template-File for [ClientConnectorRepository->update()][ClientConnectorRepository]

```php
$clientConnector = new \MyPromo\Connect\SDK\Models\ClientConnector();

$clientConnector->setConnectorId(14);
$clientConnector->setConnectorKey('shopify');
$clientConnector->setTarget('sales_channel');

# for magento connector
$clientConnectorConfigurationMagento = new \MyPromo\Connect\SDK\Models\ClientConnectorConfigurationMagento();
$clientConnector->setConfiguration($clientConnectorConfigurationMagento);

# for shopify connector
$shopifyConfigurations = new \MyPromo\Connect\SDK\Models\ClientConnectorConfigurationShopify();
$clientConnector->setConfiguration($shopifyConfigurations);
```

Configurations:

* [ClientConnectorConfigurationMagento][ClientConnectorConfigurationMagento]
* [ClientConnectorConfigurationShopify][ClientConnectorConfigurationShopify]

[ClientConnectorConfigurationMagento]: ../Models/ClientConnectorConfigurationMagento.md

[ClientConnectorConfigurationShopify]: ../Models/ClientConnectorConfigurationShopify.md

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md
