Helper class for [ProductRepository->getInventory()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptionsFulfiller = new \MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsFulfiller();
$inventoryOptionsFulfiller->setPage(1); // get data from this page number
$inventoryOptionsFulfiller->setPerPage(5);
//$inventoryOptionsFulfiller->setSku('MP-F10000-C000001'); // optional
$inventoryOptionsFulfiller->setSkuFulfiller('1234567890'); // optional
```

[ProductRepository]: ../../Repositories/Products/ProductRepository.md
