### Create a new Repository
```php
$jobRepository = new \MyPromo\Connect\SDK\Repositories\Jobs\JobRepository($client);
```

### Available Methods

###### Get all jobs
Get all jobs available for your client.
```php
$jobRepository->all($productOptions);
```

###### Find Job
Find a specific job by id.
```php
$jobRepository->find(1);
```