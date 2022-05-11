Template-File for [ClientConnectorRepository->update()][ClientConnectorRepository]

```php
$clientConnector = new \MyPromo\Connect\SDK\Models\Client\Connector();

$clientConnector->setConnectorId(14);
$clientConnector->setConnectorKey('shopify');
$clientConnector->setTarget('sales_channel');

# for magento connector
$magentoConfiguration = new \MyPromo\Connect\SDK\Models\Client\ConnectorConfigurationMagento();
$clientConnector->setConfiguration($magentoConfiguration);

# for shopify connector
$shopifyConfiguration = new \MyPromo\Connect\SDK\Models\Client\ConnectorConfigurationShopify();
$clientConnector->setConfiguration($shopifyConfiguration);
```

Configurations:

* [ClientConnectorConfigurationMagento][ClientConnectorConfigurationMagento]
* [ClientConnectorConfigurationShopify][ClientConnectorConfigurationShopify]

[ClientConnectorConfigurationMagento]: ConnectorConfigurationMagento.md

[ClientConnectorConfigurationShopify]: ConnectorConfigurationShopify.md

[ClientConnectorRepository]: ../../Repositories/Client/ClientConnectorRepository.md
