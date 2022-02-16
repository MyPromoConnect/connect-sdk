### Create a new Repository
```php
$clientConnectorRepository = new \MyPromo\Connect\SDK\Repositories\Jobs\ClientConnectorRepository($client);
```

###### Create Job
Create connector job (with [ClientConnector][ClientConnector])
```php
$clientConnector = new \MyPromo\Connect\SDK\Models\ClientConnector();
...
$clientConnectorRepository->update($clientConnector);
```

[ClientConnector]: ../Models/ClientConnector.md