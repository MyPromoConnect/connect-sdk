Helper class for [ProductRepository->getInventory()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptionsMerchant = new \MyPromo\Connect\SDK\Helpers\InventoryOptionsMerchant();
$inventoryOptionsMerchant->setFrom(1);
$inventoryOptionsMerchant->setPage(1); // get data from this page number
$inventoryOptionsMerchant->setPerPage(5);
$inventoryOptionsMerchant->setShippingFrom('DE'); // mandatory
$inventoryOptionsMerchant->setSku('MP-F10000-C000001'); // optional
```

[ProductRepository]: ../Repositories/ProductRepository.md
