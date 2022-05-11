Helper class for [ProductRepository->all()][ProductRepository]

You can use this helper class to filter and paginate the products.

```php
$productOptions = new \MyPromo\Connect\SDK\Helpers\Products\ProductOptions();
$productOptions->setPage(1); // get data from this page number
$productOptions->setPerPage(5);
$productOptions->setPagination(true|false);
$productOptions->setShippingFrom('DE');
$productOptions->setSearch('Test');
$productOptions->setAvailable(true);
$productOptions->setSku('TESTSKU');
$productOptions->setLang('DE');
$productOptions->setCurrency('EUR');
```

[ProductRepository]: ../../Repositories/Products/ProductRepository.md
