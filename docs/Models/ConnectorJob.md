Template-File for [ConnectorJobRepository->create()][ConnectorJobRepository]

```php
$connectorJob = new \MyPromo\Connect\SDK\Models\ConnectorJob();
$connectorJob->setTarget('sale_channel|orders|inventory');

$filters = new \MyPromo\Connect\SDK\Helpers\ConnectorJobFilters();
$connectorJob->setFilters($filters);

$connectorJob->setCallback($callback);

```

[Callback]: ../Models/Callback.md
[ConnectorJobFilters]: ../Helpers/ConnectorJobFilters.md
[ConnectorJobRepository]: ../Repositories/ConnectorJobRepository.md
