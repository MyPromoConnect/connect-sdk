Helper class for [ProductRepository->getPrices()][ProductRepository]

You can use this helper class to filter and paginate the prices.

```php
$priceOptionsMerchant = new \MyPromo\Connect\SDK\Helpers\Products\PriceOptionsMerchant();
$priceOptionsMerchant->setPage(1); // get data from this page number
$priceOptionsMerchant->setPerPage(5);
$priceOptionsMerchant->setShippingFrom('DE'); // mandatory
$priceOptionsMerchant->setSku('TESTSKU'); // optional
```

[ProductRepository]: ../../Repositories/Products/ProductRepository.md

