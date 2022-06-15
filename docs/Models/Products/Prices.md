ProductPrices contain the [SalesPrices][ProductSalePrice] for one product.  
The object also contains the currency of the prices and the product identified by it's SKU.

```php
$productPrices = new \MyPromo\Connect\SDK\Models\Products\Prices();

$salePrices = [
    $productSalePrice,
    ...
];

$productPrices->setSalePrices($salePrices);
$productPrices->setCurrency('EUR');
$productPrices->setSku('TESTSKU'):
```

Required Models:

- [SalePrice]

[SalePrice]: SalePrice.md
