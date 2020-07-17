ProductSalePrice contains only the price and the tier quantity at which the price applies.

It should always be used in tandem with [ProductPrices][ProductPrices].  
[ProductPrices][ProductPrices] also defines the product and the currency for the defined price.

```php
$productSalePrice = new \MyPromo\Connect\SDK\Models\ProductSalePrice();

$productSalePrice->setTireQuantity(50);
$productSalePrice->setPrice(19.99);
```

[ProductPrices]: ProductPrices.md 
