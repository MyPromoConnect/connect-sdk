### Create a new Repository
```php
$generalRepository = new \MyPromo\Connect\SDK\Repositories\Client\GeneralRepository($client);
```

###### Get Api Status
Check status of api
```php
...
$generalRepository->apiStatus();
```

###### Download File
Download File using identifier
```php
...
$generalRepository->downloadFile("short_url_identifier");
```