## Update product SEO

```php
$productSeoUpdate = new \MyPromo\Connect\SDK\Models\ProductSeoUpdate();

# Sample array to pass in product SEO for multiple products
$seo = [
        "sku"=> "TESTPRODUCT",
        "overwrites"=> [
                "product_name"=> "test name customize",
                "product_description"=> "test description customize",
                "product_description_short"=> "test description short",
                "product_description_secondary"=> "test description secondary",
                "meta_title"=> "test meta title",
                "meta_keywords"=> "test, meta, keywords",
                "meta_description"=> "test meta description"
        ]
];
            
$productSeo = [
    $seo,
    ...
];

$productSeoUpdate->setProductSeo($productSeo);
```

Required Models:

- ProductSeoUpdate

Optional:

- [Callback][Callback]

[ProductRepository]: ../Repositories/ProductRepository.md
[Callback]: Callback.md
[ProductSeoUpdate]: ProductSeoUpdate.md
