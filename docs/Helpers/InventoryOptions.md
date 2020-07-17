Helper class for [ProductRepository->getInventory()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptions = new InventoryOptions();
$inventoryOptions->setFrom(1);
$inventoryOptions->setPerPage(5);
$inventoryOptions->setSku('TESTSKU');
$inventoryOptions->setShippingFrom('DE');
```

[ProductRepository]: ../Repositories/ProductRepository.md
