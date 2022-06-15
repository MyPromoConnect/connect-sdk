### Create a new Repository

```php
$productExportRepository = new \MyPromo\Connect\SDK\Repositories\ProductFeeds\ProductExportRepository($client);
```

### Available Methods

###### Get all product exports

Get all product exports available for your client. Product exports can be filtered/paginated with this
helper: [ProductExportOptions][ProductExportOptions]

```php
$productExportOptions = new \MyPromo\Connect\SDK\Helpers\ProductFeeds\ExportOptions();
$productExportRepository->all($productExportOptions);
```

###### Find Product Export

Find a specific product export by id.

```php
$productExportRepository->find(1);
```

###### Request Product Export

Request product export with [ProductExport][ProductExport]

```php
$productExport = new \MyPromo\Connect\SDK\Models\ProductFeeds\Export();
$productExportRepository->create($productExport);
```

###### Cancel Product Export

Cancel product export pass product export ID

```php
$productExportRepository->cancel($productExport->getId());
```

###### Delete Product Export

Delete product export pass product export ID

```php
$productExportRepository->delete($productExport->getId());
```

[ProductExportOptions]: ../../Helpers/ProductFeeds/ExportOptions.md

[ProductExport]: ../../Models/ProductFeeds/Export.md