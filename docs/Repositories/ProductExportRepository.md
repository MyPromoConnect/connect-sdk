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


[ProductOptions]: ../Helpers/ProductOptions.md
[InventoryOptions]: ../Helpers/InventoryOptions.md
[PriceOptions]: ../Helpers/PriceOptions.md
[SeoOptions]: ../Helpers/SeoOptions.md
[ProductInventory]: ../Models/ProductInventory.md
[ProductPriceUpdate]: ../Models/ProductPriceUpdate.md
[ProductSeoUpdate]: ../Models/ProductSeoUpdate.md
