Helper class for [ProductImportRepository->all()][ProductImportRepository]

You can use this helper class to filter and paginate the products.

```php
$confirmProductImportOptions = new \MyPromo\Connect\SDK\Helpers\ConfirmProductImportOptions();
$confirmProductImportOptions->setExecuteDate(new \DateTime(date('Y-m-d H:i:s')));
```

[ProductImportRepository]: ../Repositories/ProductImportRepository.md
