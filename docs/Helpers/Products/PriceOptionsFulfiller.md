Helper class for [ProductRepository->getPrices()][ProductRepository]

You can use this helper class to filter and paginate the prices.

```php
$priceOptionsFulfiller = new \MyPromo\Connect\SDK\Helpers\Products\PriceOptionsFulfiller();
$priceOptionsFulfiller->setPage(1); // get data from this page number
$priceOptionsFulfiller->setPerPage(5);
//$priceOptionsFulfiller->setSku('TESTSKU'); // optional
$priceOptionsFulfiller->setSkuFulfiller('SKU_FULFILLER'); // optional
```

[ProductRepository]: ../../Repositories/Products/ProductRepository.md

