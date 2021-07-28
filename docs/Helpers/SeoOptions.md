Helper class for [ProductRepository->getSeo()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\SeoOptions();
$inventoryOptions->setFrom(1);
$inventoryOptions->setPage(1); // get data from this page number
$inventoryOptions->setPerPage(5);
$inventoryOptions->setSku('TESTSKU');
```

[SeoOptions]: ../Helpers/SeoOptions.md
[ProductRepository]: ../Repositories/ProductRepository.md
