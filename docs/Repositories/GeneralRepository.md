### Create a new Repository

```php
$generalRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\GeneralRepository(client);
```

###### Get Api Status

Check status of api

```php
...
$generalRepository->apiStatus();
```

###### Download File

Download a file from api using url from api response and save to a given file path locally.

```php
...
$url = 'https://api.mypromo.com/v1/BEAA0G';
$targetFile = '/path/to/file.ext';

$generalRepository->downloadFile($url, $targetFile);
```