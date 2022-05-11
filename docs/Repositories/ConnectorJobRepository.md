### Create a new Repository

```php
$connectorRepository = new \MyPromo\Connect\SDK\Repositories\Jobs\JobRepository($client);
```

###### Create Job
Create connector job (with [ConnectorJob][ConnectorJob])
```php
$connectorJob = new \MyPromo\Connect\SDK\Models\ConnectorJob();
...
$connectorRepository->create($connectorJob);
```

[ConnectorJob]: ../Models/Jobs/Job.md