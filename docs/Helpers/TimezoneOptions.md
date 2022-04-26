Helper class for `\MyPromo\Connect\SDK\Repositories\TimezoneRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$timezoneOptions = new \MyPromo\Connect\SDK\Helpers\TimezoneOptions();
$timezoneOptions->setFrom(1);
$timezoneOptions->setPage(1); // get data from this page number
$timezoneOptions->setPerPage(5);
$timezoneOptions->setPagination(5);
```
