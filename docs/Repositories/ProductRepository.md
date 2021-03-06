### Create a new Repository
```php
$productRepository = new \MyPromo\Connect\SDK\Repositories\Products\ProductRepository($client);
```

### Available Methods
###### Get all products
Get all products available for your client.
Products can be filtered/paginated with this helper: [ProductOptions][ProductOptions]
```php
$productOptions = new \MyPromo\Connect\SDK\Helpers\ProductOptions();
...

or

$productOptions = [
    'from'          => 1,
    'per_page'      => 5,
    'shipping_from' => 'DE',
    'search'        => 'Test',
    'available'     => true|false,
    'sku'           => 'TESTSKU',
    'lang'          => 'DE',
    'currency'      => 'EUR',
    'test_product'  => true|false
];

$productRepository->all($productOptions);
```
<br />

###### Find Product
Find a specific product by id.
```php
$productRepository->find(1);
```
<br />

###### Get current inventory for merchant
Get the current inventory of your client type merchant.
Results can be filtered/paginated with this helper: [InventoryOptions][InventoryOptions]

```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\InventoryOptions();
...
or

$inventoryOptions = [
    'from'          => 1,
    'per_page'      => 5,
    'sku'           => 'TESTSKU',
    'shipping_from' => 'DE',
];

$productRepository->getInventory($inventoryOptions);
```
<br />

###### Get current inventory for fulfiller
Get the current inventory of your client type fulfiller.
Results can be filtered/paginated with this helper: [InventoryOptions][InventoryOptions]
```php
$inventoryOptions = new \MyPromo\Connect\SDK\Helpers\InventoryOptions();
...
or

$inventoryOptions = [
    'from'          => 1,
    'per_page'      => 5,
    'sku'           => 'TESTSKU',
    'sku_fulfiller' => 'SKU-FULFILLER',
];

$productRepository->getInventory($inventoryOptions);
```
<br />

###### Update inventory for client
Update the inventory of your client (with [ProductInventory][ProductInventory]).
```php
$productRepository->putInventory($productInventory);
```
<br />

###### Get all prices
Get all prices for products which are available for your client.
Results can be filtered/paginated with this helper: [PriceOptions][PriceOptions]
```php
$priceOptions = new \MyPromo\Connect\SDK\Helpers\PriceOptions();
...
or

$priceOptions = [
    'from'          => 1,
    'per_page'      => 5,
    'sku'           => 'TESTSKU',
    'shipping_from' => 'DE',
];

$productRepository->getPrices($priceOptions);
```
<br />

###### Update prices
Update the retail prices of your client (with [ProductPriceUpdate][ProductPriceUpdate])

```php
$productRepository->putPrices($productPriceUpdate);
```

<br />

###### Get all product seo's
Get all seo's for products which are available for your client.
Results can be filtered/paginated with this helper: [SeoOptions]
```php
$seoOptions = new \MyPromo\Connect\SDK\Helpers\SeoOptions();
...
or

$seoOptions = [
    'from'          => 1,
    'per_page'      => 5,
    'sku'           => 'TESTSKU',
];

$productRepository->getSeo($seoOptions);
```
<br />

###### Update Seo
Update the products SEO of your client (with [ProductSeoUpdate])

```php
$productRepository->putSeo($productSeoUpdate);
```

[ProductOptions]: ../Helpers/ProductOptions.md
[InventoryOptions]: ../Helpers/InventoryOptions.md
[PriceOptions]: ../Helpers/PriceOptions.md
[SeoOptions]: ../Helpers/SeoOptions.md
[ProductInventory]: ../Models/ProductInventory.md
[ProductPriceUpdate]: ../Models/ProductPriceUpdate.md
[ProductSeoUpdate]: ../Models/ProductSeoUpdate.md
