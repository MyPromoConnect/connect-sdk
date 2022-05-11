Template-File for [ConnectorJobRepository->create()][ConnectorJobRepository]

```php
$connectorJob = new \MyPromo\Connect\SDK\Models\Jobs\Job();
$connectorJob->setTarget('sales_channel|orders|inventory|...');

$filters = new \MyPromo\Connect\SDK\Models\Jobs\JobFilters();
$connectorJob->setFilters($filters);

$connectorJob->setCallback($callback);

```

Filters:

* [ConnectorJobFilters][ConnectorJobFilters]

Optional:

* [Callback][Callback]

[Callback]: ../Callback.md

[ConnectorJobFilters]: JobFilters.md

[ConnectorJobRepository]: ../../Repositories/Jobs/JobRepository.md
