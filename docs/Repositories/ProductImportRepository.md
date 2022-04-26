### Create a new Repository
```php
$productImportRepository = new \MyPromo\Connect\SDK\Repositories\ProductFeeds\ProductImportRepository($client);
```

### Available Methods
###### Get all product exports
Get all product imports available for your client.
Product imports can be filtered/paginated with this helper: [ProductImportOptions][ProductImportOptions]
```php
$productImportOptions = new \MyPromo\Connect\SDK\Helpers\ProductImportOptions();
...

or

$productImportOptions = [
'page'          => 1,
'per_page'      => 5,
'pagination'    => true|false,
'created_from'  => 'created from date time',
'created_to'    => 'created to date time',
];

$productImportRepository->all($productImportOptions);
```
<br />

###### Find Product Import
Find a specific product import by id.
```php
$productImportRepository->find(1);
```
<br />

###### Request Product Import
Request product import (with [ProductImport][ProductImport])
```php
$productImport = new \MyPromo\Connect\SDK\Models\ProductImport();
...
$productImportRepository->requestImport($productImport);
```

###### Cancel Product Import
Cancel product import pass product import ID
```php
$productImportRepository->cancelImport($productImport->getId());
```

###### Delete Product Import
Delete product import pass product import ID
```php
$productImportRepository->deleteImport($productImport->getId());
```

###### Errors of Product Import
Errors of product import pass product import ID
```php
$productImportRepository->errors($productImport->getId());
```

###### Validate Product Import
validate product import pass product import ID
```php
$productImportRepository->validate($productImport->getId());
```

###### Confirm Product Import
Confirm product import pass product import ID and confirm options
```php
$confirmProductImportOptions = new \MyPromo\Connect\SDK\Helpers\ConfirmProductImportOptions();
$confirmProductImportOptions->setExecuteDate(new \DateTime(date('Y-m-d H:i:s')));

$productImportRepository->confirm($confirmProductImportOptions, $productImport->getId());
```

[ProductExportOptions]: ../Helpers/ProductExportOptions.md
[ProductExport]: ../Models/ProductExport.md