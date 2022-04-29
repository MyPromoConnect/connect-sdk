Helper class for `\MyPromo\Connect\SDK\Repositories\ClientConnectorRepository::all()`

You can use this helper class to filter/paginate connectors assigned to clients.

```php
$clientConnectorOptions = new \MyPromo\Connect\SDK\Helpers\ClientConnectorOptions();
$clientConnectorOptions->setPage(1); // get data from this page number
$clientConnectorOptions->setPerPage(5);
$clientConnectorOptions->setPagination(true|false);
$clientConnectorOptions->setConnectorId(12);
$clientConnectorOptions->setConnectorKey('shopify');
$clientConnectorOptions->setConnectorTarget('sales_channel');
```  
