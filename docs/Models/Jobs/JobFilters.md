Filter options for [ConnectorJobRepository->create()][ConnectorJobRepository]

```php
$filters = new \MyPromo\Connect\SDK\Models\Jobs\JobFilters();

# Sales Channel
$filters->setJob('products|images|collections|tax_rates|shipping_rates|prices|inventory'); // mandatory
$filters->setFulfiller('Id of fullfiller');
$filters->setProducts('Id or comma seperated ids of products');
$filters->setTestProduct(true|false);

# Orders (e.g. pick up orders by a custom connector)
$filters->setReference('reference to product');
$filters->setStatus('new');
$filters->setSkipDuplicates(true|false);

# Tracking 
# no filters available

# Inventory
# no filters available

# Prices
# no filters available

# SEO
# no filters available


# Special filters
$filters->setFilter($key);
$filters->setFilterValue($value);

```

Notes:

* most of the filters are optionally
* if no filters available, pass an emtpy `$filters` object

[ConnectorJobRepository]: ../../Repositories/Jobs/JobRepository.md
