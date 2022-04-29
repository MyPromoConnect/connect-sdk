Helper class for `\MyPromo\Connect\SDK\Repositories\CarrierRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$carrierOptions = new \MyPromo\Connect\SDK\Helpers\CarrierOptions();
$carrierOptions->setPage(1); // get data from this page number
$carrierOptions->setPerPage(5);
$carrierOptions->setPagination(true|false);
```
