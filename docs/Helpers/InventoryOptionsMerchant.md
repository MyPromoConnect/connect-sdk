Helper class for [ProductRepository->getInventory()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\InventoryOptionsMerchant();
$inventoryOptions->setFrom(1);
$inventoryOptions->setPage(1); // get data from this page number
$inventoryOptions->setPerPage(5);
$inventoryOptions->setSku('TESTSKU');
$inventoryOptions->setShippingFrom('DE');
$inventoryOptions->setSkuFulfiller('SKU_FULFILLER');
```

[ProductRepository]: ../Repositories/ProductRepository.md
