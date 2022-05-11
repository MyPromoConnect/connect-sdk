Helper class for [ProductRepository->getInventory()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptionsMerchant = new \MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsMerchant();
$inventoryOptionsMerchant->setShippingFrom('DE'); // mandatory
$inventoryOptionsMerchant->setSku('MP-F10000-C000001'); // optional
```

[ProductRepository]: ../../Repositories/Products/ProductRepository.md
