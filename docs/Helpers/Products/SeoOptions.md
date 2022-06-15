Helper class for [ProductRepository->getSeo()][ProductRepository]

You can use this helper class to filter and paginate the inventory results.

```php
$seoOptions = new \MyPromo\Connect\SDK\Helpers\Products\SeoOptions();
$seoOptions->setPage(1); // get data from this page number
$seoOptions->setPerPage(5);
$seoOptions->setSku('TESTSKU');
```

[SeoOptions]: SeoOptions.md

[ProductRepository]: ../../Repositories/Products/ProductRepository.md
