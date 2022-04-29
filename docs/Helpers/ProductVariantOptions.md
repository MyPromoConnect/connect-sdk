Helper class for [ProductRepository->all()][ProductRepository]

You can use this helper class to filter and paginate the products.

```php
$productVariantOptions = new \MyPromo\Connect\SDK\Helpers\ProductVariantOptions();
$productVariantOptions->setPage(1); // get data from this page number
$productVariantOptions->setPerPage(5);
$productVariantOptions->setPagination(true|false);
$productVariantOptions->setLang('DE');
$productVariantOptions->setId('product id'); // if id is set sku will become optional
$productVariantOptions->setSku('TESTSKU'); // if sku is set id become optional
$productVariantOptions->setReference('reference_of_product'); // optional
```

[ProductRepository]: ../Repositories/ProductRepository.md
