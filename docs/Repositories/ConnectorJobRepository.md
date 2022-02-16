### Create a new Repository
```php
$connectorRepository = new \MyPromo\Connect\SDK\Repositories\Jobs\ConnectorJobRepository($client);
```

###### Create Job
Request product import (with [ProductImport][ProductImport])
```php
$connectorJob = new \MyPromo\Connect\SDK\Models\ConnectorJob();
...
$connectorRepository->createJob($connectorJob);
```

[ConnectorJob]: ../Models/ConnectorJob.md