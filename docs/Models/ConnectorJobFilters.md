Filter options for [ConnectorJobRepository->create()][ConnectorJobRepository]

```php
$filters = new \MyPromo\Connect\SDK\Models\ConnectorJobFilters();

# These filters can be used for job = sales_channel
$filters->setJob('prices|inventory');
$filters->setFulfiller('Id of fullfiller');
$filters->setProducts('Id or comma seperated ids of products');
$filters->setTestProduct(true|false);

# These filters can be used if job = orders
$filters->setReference('reference to product');
$filters->setStatus('new');
$filters->setSkipDuplicates(true|false);

```

Notes:

* all filters are optional
* if no filters available, pass an emtpy `$filters` object

[ConnectorJobRepository]: ../Repositories/ConnectorJobRepository.md
