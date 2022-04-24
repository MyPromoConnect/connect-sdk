Template-File for [ProductImportRepository->create()][ProductImportRepository]

```php
$productImport = new \MyPromo\Connect\SDK\Models\ProductImport();
$productImport->setTempletaId('template_key');
$productImport->setTempletaKey('template_key');
$productImport->setDryRun(true|false);

$productImportInput = new \MyPromo\Connect\SDK\Helpers\ProductImportInput();
$productImport->setInput($productImportInput);

$productImport->setCallback($callback);

```

Helpers:

- [ProductImportInput][ProductImportInput]


Optional:

- [Callback][callback]



[Callback]: ../Models/Callback.md
[ProductImportInput]: ../Helpers/ProductImportInput.md
[ProductImportRepository]: ../Repositories/ProductImportRepository.md
