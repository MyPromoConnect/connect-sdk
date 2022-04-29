Helper class for `\MyPromo\Connect\SDK\Repositories\ClientConnectorRepository::all()`

You can use this helper class to filter/paginate connectors assigned to clients.

```php
$orderOptions = new \MyPromo\Connect\SDK\Helpers\ClientConnectorOptions();
$orderOptions->setPage(1); // get data from this page number
$orderOptions->setPerPage(5);
$orderOptions->setPagination(true|false);
$orderOptions->setConnectorId(12);
$orderOptions->setConnectorKey('shopify');
$orderOptions->setConnectorTarget('sales-channel');
```  
