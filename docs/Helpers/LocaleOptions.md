Helper class for `\MyPromo\Connect\SDK\Repositories\LocaleRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$localeOptions = new \MyPromo\Connect\SDK\Helpers\LocaleOptions();
$localeOptions->setPage(1); // get data from this page number
$localeOptions->setPerPage(5);
$localeOptions->setPagination(true|false);
```
