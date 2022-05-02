Helper class for [ProductImportRepository->confirm()][ProductImportRepository]

Use this model to set options when confirming e.g. a dry run.

```php
$productImportConfirm = new \MyPromo\Connect\SDK\Helpers\ProductImportConfirm();
$productImportConfirm->setExecuteDate(new \DateTime(date('Y-m-d H:i:s')));
```

[ProductImportRepository]: ../Repositories/ProductImportRepository.md
