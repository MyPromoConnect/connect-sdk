Helper class for [ProductRepository->getSeo()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$seoOptions = new \MyPromo\Connect\SDK\Helpers\SeoOptions();
$seoOptions->setPage(1); // get data from this page number
$seoOptions->setPerPage(5);
$seoOptions->setSku('TESTSKU');
```

[SeoOptions]: ../Helpers/SeoOptions.md

[ProductRepository]: ../Repositories/ProductRepository.md
