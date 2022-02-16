Helper class for [ProductRepository->all()][ProductRepository]

You can use this helper class to filter and paginate the products.

```php
$productOptions = new \MyPromo\Connect\SDK\Helpers\ProductVariantOptions();
$productOptions->setPage(1); // get data from this page number
$productOptions->setPerPage(5);
$productOptions->setPagination(5);
$productOptions->setLang('DE');

$productOptions->setId('product id'); // if id is set sku will become optional
$productOptions->setSku('TESTSKU'); // if sku is set id become optional
$productOptions->setReference('reference_of_product'); // optional
```

[ProductRepository]: ../Repositories/ProductRepository.md
