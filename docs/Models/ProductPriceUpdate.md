Template-File for [ProductRepository->putPrices()][ProductRepository].

A ProductPriceUpdate Object holds multiple [ProductPrices][ProductPrices] and optionally a [Callback][Callback].

```php
$productPriceUpdate = new \MyPromo\Connect\SDK\Models\ProductPriceUpdate();

$productPrices = [
    $productPrice,
    ...
];

$productPriceUpdate->setProductPrices($productPrices);
```

Required Models: 
- [ProductPrices][ProductPrices]

Optional:
- [Callback][Callback]

[ProductRepository]: ../Repositories/ProductRepository.md
[Callback]: Callback.md
[ProductPrices]: ProductPrices.md
