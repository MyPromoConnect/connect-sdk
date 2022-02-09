Template-File for [ProductExportRepository->create()][ProductExportRepository]

```php
$productExport = new \MyPromo\Connect\SDK\Models\ProductExport();
$productExport->setTempletaId('template_id');
$productExport->setTempletaKey('template_key');

$productExportFilterOptions = new \MyPromo\Connect\SDK\Helpers\ProductExportFilterOptions();
$productExport->setFilters($productExportFilterOptions);

$productExport->setCallback($callback);

```

[Callback]: ../Models/Callback.md
[ProductExportFilterOptions]: ../Helpers/ProductExportFilterOptions.md
[ProductExportRepository]: ../Repositories/ProductExportRepository.md
