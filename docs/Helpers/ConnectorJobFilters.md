Helper class for [ConnectorJobRepository->all()][ConnectorJobRepository]

You can use this helper class to filter and paginate the products.

NOTE: all these filters are optional

```php
$filters = new \MyPromo\Connect\SDK\Helpers\ConnectorJobFilters();
# These filters can be used for job = sales_channel
$filters->setJob('prices|inventory');
$filters->setFulfiller('Id of fullfiller');
$filters->setProducts('Id or comma seperated ids of products');
$filters->setTestProduct(true|false);

# These filters can be used if job = orders
$filters->setReference('reference to product');
$filters->setStatus('new');
$filters->setSkipDuplicates(true|false);

# There are no filfers available for job = inventory , so you can pass empty $filters object
```

[ConnectorJobRepository]: ../Repositories/ConnectorJobRepository.md
