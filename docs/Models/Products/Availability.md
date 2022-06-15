ProductAvailabilities are used in [ProductInventory][ProductInventory] to represent the availability of one product.

```php
$productAvailability = new \MyPromo\Connect\SDK\Models\Products\Availability();
$productAvailability->setSku('TESTSKU');
$productAvailability->setAvailable(true);
```

[ProductInventory]: InventoryUpdate.md
