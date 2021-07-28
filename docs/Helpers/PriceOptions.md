Helper class for [ProductRepository->getPrices()][ProductRepository]

You can use this helper class to filter and paginate the prices.

```php
$priceOptions = new PriceOptions();
$priceOptions->setFrom(1);
$priceOptions->setPage(1); // get data from this page number
$priceOptions->setPerPage(5);
$priceOptions->setSku('TESTSKU');
$priceOptions->setShippingFrom('DE');
$priceOptions->setSkuFulfiller('SKU_FULFILLER');
```

[ProductRepository]: ../Repositories/ProductRepository.md

