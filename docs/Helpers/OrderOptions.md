Helper class for `\MyPromo\Connect\SDK\Repositories\OrderRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$orderOptions = new \MyPromo\Connect\SDK\Helpers\OrderOptions();
$orderOptions->setFrom(1);
$orderOptions->setPage(1); // get data from this page number
$orderOptions->setPerPage(5);
$orderOptions->setCreatedFrom(new DateTime('date'));
$orderOptions->setCreatedTo(new DateTime('date'));
$orderOptions->setUpdatedFrom(new DateTime('date'));
$orderOptions->setUpdatedTo(new DateTime('date'));
$orderOptions->setReference('xyz123');
$orderOptions->setReference2('abc123');
```  
  
Supported DateTime formats: 
 - `Y-m-d`
