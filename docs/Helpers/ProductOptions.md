Helper class for [ProductRepository->all()][ProductRepository]

You can use this helper class to filter and paginate the products.

```php
$productOptions = new ProductOptions();
$productOptions->setFrom(1);
$productOptions->setPage(1); // get data from this page number
$productOptions->setPerPage(5);
$productOptions->setShippingFrom('DE');
$productOptions->setSearch('Test');
$productOptions->setAvailable(true);
$productOptions->setSku('TESTSKU');
$productOptions->setLang('DE');
$productOptions->setCurrency('EUR');
```

[ProductRepository]: ../Repositories/ProductRepository.md
