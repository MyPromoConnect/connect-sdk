Helper class for `\MyPromo\Connect\SDK\Repositories\ProductionOrders\ProductionOrderRepository::all()`

You can use this helper class to filter/paginate orders.

```php
$productionOrderOptions = new \MyPromo\Connect\SDK\Helpers\ProductionOrders\ProductionOrderOptions();
$productionOrderOptions->setPage(1); // get data from this page number
$productionOrderOptions->setPerPage(5);
$productionOrderOptions->setPagination(true|false);
$productionOrderOptions->setCreatedFrom(new \DateTime(date('Y-m-d H:i:s')));
$productionOrderOptions->setCreatedTo(new \DateTime(date('Y-m-d H:i:s')));
$productionOrderOptions->setUpdatedFrom(new \DateTime(date('Y-m-d H:i:s')));
$productionOrderOptions->setUpdatedTo(new \DateTime(date('Y-m-d H:i:s')));
```  

Supported DateTime formats:

- `Y-m-d`
