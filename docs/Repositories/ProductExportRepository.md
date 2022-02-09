### Create a new Repository
```php
$productExportRepository = new \MyPromo\Connect\SDK\Repositories\Products\ProductExportRepository($client);
```

### Available Methods
###### Get all product exports
Get all product exports available for your client.
Product exports can be filtered/paginated with this helper: [ProductExportOptions][ProductExportOptions]
```php
$productExportOptions = new \MyPromo\Connect\SDK\Helpers\ProductExportOptions();
...

or

$productExportOptions = [
'page'          => 1,
'per_page'      => 5,
'pagination'    => true|false,
'created_from'  => 'created from date time',
'created_to'    => 'created to date time',
];

$productExportRepository->all($productExportOptions);
```
<br />

###### Find Product Export
Find a specific product export by id.
```php
$productExportRepository->find(1);
```
<br />

###### Request Product Export
Request product export (with [ProductExport][ProductExport])
```php
$productExport = new \MyPromo\Connect\SDK\Models\ProductExport();
...
$productExportRepository->requestExport($productExport);
```

###### Cancel Product Export
Cancel product export pass product export ID
```php
$productExportRepository->cancelExport($productExport->getId());
```

###### Delete Product Export
Delete product export pass product export ID
```php
$productExportRepository->deleteExport($productExport->getId());
```

[ProductExportOptions]: ../Helpers/ProductExportOptions.md
[ProductExport]: ../Models/ProductExport.md