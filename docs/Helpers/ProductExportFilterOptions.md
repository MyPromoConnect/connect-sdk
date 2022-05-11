Helper class for [ProductExportRepository->all()][ProductExportRepository]

You can use this helper class to filter and paginate the products.

```php
$productExportFilterOptions = new \MyPromo\Connect\SDK\Helpers\ProductExportFilters();
$productExportFilterOptions->setCategoryId(1);
$productExportFilterOptions->setCurrency('EUR');
$productExportFilterOptions->setLang('DE');
$productExportFilterOptions->setProductTypes('type of products that you want to include');
$productExportFilterOptions->setSearch('search value for product | null');
$productExportFilterOptions->setSku('SKU-PRODUCT');
$productExportFilterOptions->setShippingFrom('DE');
```

[ProductExportRepository]: ../Repositories/ProductExportRepository.md
