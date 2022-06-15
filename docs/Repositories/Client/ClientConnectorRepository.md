### Create a new Repository

```php
$clientConnectorRepository = new \MyPromo\Connect\SDK\Repositories\Client\ClientConnectorRepository($client);
```

###### Get connector settings

Connector settings for a client can be filtered/paginated with the helper [ConnectorOptions][ConnectorOptions].

```php
$connectorOptions = new \MyPromo\Connect\SDK\Helpers\Client\ConnectorOptions();

$clientConnectorRepository->all($connectorOptions);
```

###### Update connector settings

Update client connector settings with [Connector][Connector].

```php
$clientConnector = new \MyPromo\Connect\SDK\Models\Client\Connector();
$clientConnectorRepository->update($clientConnector);
```

[Connector]: ../../Models/Client/Connector.md

[ConnectorOptions]: ../../Helpers/Client/ConnectorOptions.md