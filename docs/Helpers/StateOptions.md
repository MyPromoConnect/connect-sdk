Helper class for `\MyPromo\Connect\SDK\Repositories\StateRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$options = new \MyPromo\Connect\SDK\Helpers\StateOptions();
$options->setFrom(1);
$options->setPage(1); // get data from this page number
$options->setPerPage(5);
```
