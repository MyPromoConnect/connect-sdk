Helper class for [ProductImportRepository->all()][ProductImportRepository]

You can use this helper class to filter and paginate the products.

```php
$productImportOptions = new \MyPromo\Connect\SDK\Helpers\ProductImportOptions();
$productImportOptions->setPage(1); // get data from this page number
$productImportOptions->setPerPage(5);
$productImportOptions->setPagination(true);
$productImportOptions->setCreatedFrom(new \DateTime(date('Y-m-d H:i:s')));
$productImportOptions->setCreatedTo(new \DateTime(date('Y-m-d H:i:s')));
```

[ProductImportRepository]: ../Repositories/ProductImportRepository.md
