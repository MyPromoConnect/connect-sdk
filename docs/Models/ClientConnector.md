Template-File for [ClientConnectorRepository->create()][ClientConnectorRepository]

```php
$clientConnector = new \MyPromo\Connect\SDK\Models\ClientConnector();

$clientConnector->setConnectorId(14);
$clientConnector->setConnectorKey('shopify');
$clientConnector->setTarget('sales_channel');

# for magento connector
$magentoConfigurations = new \MyPromo\Connect\SDK\Helpers\ConnectorConfigurationsMagento();
$clientConnector->setConfiguration($magentoConfigurations);

# for shopify connector
$shopifyConfigurations = new \MyPromo\Connect\SDK\Helpers\ConnectorConfigurationsShopify();
$clientConnector->setConfiguration($shopifyConfigurations);
```

[ClientConnectorRepository]: ../Repositories/ClientConnectorRepository.md
