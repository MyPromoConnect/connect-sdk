Helper class for `\MyPromo\Connect\SDK\Repositories\Miscellaneous\StateRepository::all()`

You can use this helper class to filter/paginate.

```php
$stateOptions = new \MyPromo\Connect\SDK\Helpers\Miscellaneous\StateOptions();
$stateOptions->setPage(1); // get data from this page number
$stateOptions->setPerPage(5);
$stateOptions->setPagination(true|false);
```
