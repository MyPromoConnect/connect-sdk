Template-File for [ProductRepository->putInventory()][ProductRepository].

A ProductInventory object holds multiple instances of [ProductAvailability][ProductAvailability] 
which represent the actual availability of a product.

```php
$productInventory = new \MyPromo\Connect\SDK\Models\ProductInventory();

$productAvailabilities = [
    $productAvailability,
    ...
];

$productInventory->setProductAvailabilities($productAvailabilities);
```

Optional fields:
- [Callback][Callback]

[ProductRepository]: ../Repositories/ProductRepository.md
[ProductAvailability]: ProductAvailability.md
[Callback]: Callback.md
