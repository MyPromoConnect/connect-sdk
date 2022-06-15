### Create a new Repository

```php
$productRepository = new \MyPromo\Connect\SDK\Repositories\Products\ProductRepository($client);
```

### Available Methods

###### Get all products

Get all products available for your client. Products can be filtered/paginated with the
helper: [ProductOptions][ProductOptions]

```php
$productOptions = new \MyPromo\Connect\SDK\Helpers\Products\ProductOptions();
$productRepository->all($productOptions);
```

###### Find Product

Find a specific product by id.

```php
$productRepository->find(1);
```

###### Get current inventory for merchant

Get the current inventory of your client type merchant. Results can be filtered/paginated with this
helper: [InventoryOptions][InventoryOptions]

```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsMerchant();
$productRepository->getInventory($inventoryOptions);
```

###### Get current inventory for fulfiller

Get the current inventory of your client type fulfiller. Results can be filtered/paginated with this
helper: [InventoryOptionsMerchant][InventoryOptionsMerchant]

```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsFulfiller();
$productRepository->getInventory($inventoryOptions);
```

###### Update inventory for client

Update the inventory of your client (with [ProductInventory][ProductInventory]).

```php
$productRepository->putInventory($productInventory);
```

###### Get all prices

Get all prices for products which are available for your client. Results can be filtered/paginated with this
helper: [PriceOptions][PriceOptions]

```php
// merchants
$priceOptionsMerchant = new \MyPromo\Connect\SDK\Helpers\Products\PriceOptionsMerchant();
$productRepository->getPrices($priceOptionsMerchant);
```

```php
// fulfiller
$priceOptionsFulfiller = new \MyPromo\Connect\SDK\Helpers\Products\PriceOptionsFulfiller();
$productRepository->getPrices($priceOptionsFulfiller);
```

###### Update prices

Update the retail prices of your client (with [ProductPriceUpdate][ProductPriceUpdate])

```php
$productRepository->putPrices($productPriceUpdate);
```

###### Get all product seo's

Get all seo's for products which are available for your client. Results can be filtered/paginated with this
helper: [SeoOptions]

```php
$seoOptions = new \MyPromo\Connect\SDK\Helpers\Products\SeoOptions();
$productRepository->getSeo($seoOptions);
```

###### Update Seo

Update the products SEO of your client (with [ProductSeoUpdate])

```php
$productRepository->putSeo($productSeoUpdate);
```

###### Get Product variants

Get all variants of product Products can be filtered/paginated with this
helper: [ProductVariantOptions][ProductVariantOptions]

```php
$productVariantOptions = new \MyPromo\Connect\SDK\Helpers\Products\ProductVariantOptions();
$productRepository->getVariants($productVariantOptions);
```

###### Get Product Variant

Get a specific product variant by id.

```php
$productRepository->getVariant(1);
```

[ProductOptions]: ../../Helpers/Products/ProductOptions.md

[ProductVariantOptions]: ../../Helpers/Products/ProductVariantOptions.md

[InventoryOptionsMerchant]: ../../Helpers/Products/InventoryOptionsMerchant.md

[PriceOptionsMerchant]: ../../Helpers/Products/PriceOptionsMerchant.md

[PriceOptionsFulfiller]: ../../Helpers/Products/PriceOptionsFulfiller.md

[SeoOptions]: ../../Helpers/Products/SeoOptions.md

[ProductInventory]: ../../Models/Products/InventoryUpdate.md

[ProductPriceUpdate]: ../../Models/Products/PriceUpdate.md

[ProductSeoUpdate]: ../../Models/Products/SeoUpdate.md
