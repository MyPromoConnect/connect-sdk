Helper class for `\MyPromo\Connect\SDK\Repositories\Orders\OrderRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$orderOptions = new \MyPromo\Connect\SDK\Helpers\Orders\OrderOptions();
$orderOptions->setPage(1); // get data from this page number
$orderOptions->setPerPage(5);
$orderOptions->setPagination(true|false);
$orderOptions->setCreatedFrom(new \DateTime(date('Y-m-d H:i:s')));
$orderOptions->setCreatedTo(new \DateTime(date('Y-m-d H:i:s')));
$orderOptions->setUpdatedFrom(new \DateTime(date('Y-m-d H:i:s')));
$orderOptions->setUpdatedTo(new \DateTime(date('Y-m-d H:i:s')));
$orderOptions->setReference('xyz123');
$orderOptions->setReference2('abc123');
```  

Supported DateTime formats:

- `Y-m-d`
