Template-File for [ConnectorJobRepository->create()][ConnectorJobRepository]

```php
$connectorJob = new \MyPromo\Connect\SDK\Models\ConnectorJob();
$connectorJob->setTarget('sales_channel|orders|inventory|...');

$filters = new \MyPromo\Connect\SDK\Helpers\ConnectorJobFilters();
$connectorJob->setFilters($filters);

$connectorJob->setCallback($callback);

```

Filters:

* [ConnectorJobFilters][ConnectorJobFilters]

Optional:

* [Callback][Callback]


[Callback]: ../Models/Callback.md
[ConnectorJobFilters]: ../Helpers/ConnectorJobFilters.md
[ConnectorJobRepository]: ../Repositories/ConnectorJobRepository.md
