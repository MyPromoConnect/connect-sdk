Template-File for [ProductExportRepository->create()][ProductExportRepository]

```php
$productExport = new \MyPromo\Connect\SDK\Models\ProductExport();

$productExport->setTempletaId('template_id');
$productExport->setTempletaKey('template_key');
$productExport->setFormat('xslx');

$productExportFilterOptions = new \MyPromo\Connect\SDK\Helpers\ProductExportFilters();
$productExport->setFilters($productExportFilterOptions);

$productExport->setCallback($callback);

```

Optional:

- [Callback][callback]


[callback]: ../Models/Callback.md
[ProductExportFilterOptions]: ../Helpers/ProductExportFilterOptions.md
[ProductExportRepository]: ../Repositories/ProductExportRepository.md
