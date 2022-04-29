Helper class for `\MyPromo\Connect\SDK\Repositories\CountryRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$countryOptions = new \MyPromo\Connect\SDK\Helpers\CountryOptions();
$countryOptions->setPage(1); // get data from this page number
$countryOptions->setPerPage(5);
$countryOptions->setPagination(true|false);
```
