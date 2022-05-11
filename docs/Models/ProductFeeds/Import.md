Template-File for [ProductImportRepository->create()][ProductImportRepository]

```php
$productImport = new \MyPromo\Connect\SDK\Models\ProductFeeds\Import();
$productImport->setTempletaId('template_key');
$productImport->setTempletaKey('template_key');
$productImport->setDryRun(true|false);

$productImportInput = new \MyPromo\Connect\SDK\Models\ProductFeeds\ImportInput();
$productImport->setInput($productImportInput);

$productImport->setCallback($callback);

```

Models:

- [ImportInput][ImportInput]

Optional:

- [Callback][callback]

[Callback]: ../Callback.md

[ImportInput]: ImportInput.md

[ProductImportRepository]: ../../Repositories/ProductFeeds/ProductImportRepository.md
