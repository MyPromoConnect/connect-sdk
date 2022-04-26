Helper class for `\MyPromo\Connect\SDK\Repositories\StateRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$stateOptions = new \MyPromo\Connect\SDK\Helpers\StateOptions();
$stateOptions->setFrom(1);
$stateOptions->setPage(1); // get data from this page number
$stateOptions->setPerPage(5);
```
