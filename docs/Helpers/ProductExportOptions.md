Helper class for [ProductExportRepository->all()][ProductExportRepository]

You can use this helper class to filter and paginate the products.

```php
$productExportOptions = new \MyPromo\Connect\SDK\Helpers\ProductExportOptions();
$productExportOptions->setPage(1); // get data from this page number
$productExportOptions->setPerPage(5);
$productExportOptions->setPagination(true);
$productExportOptions->setCreatedFrom('DATETIME');
$productExportOptions->setCreatedTo('DATETIME');
```

[ProductExportRepository]: ../Repositories/ProductExportRepository.md
