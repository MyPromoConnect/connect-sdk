#### Create a new Repository
```php
$productRepository = new \MyPromo\Connect\SDK\Repositories\Products\ProductRepository($client);
```

Template-Files:
- 

#### Available Methods

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
    'available'     => 'true',
    'sku'           => 'TESTSKU',
    'lang'          => 'DE',
    'currency'      => 'EUR'
];

$productRepository->all($productOptions);
```

###### Find Product
Find a specific product by id.
```php
$productRepository->find(1);
```

###### Get current inventory
Get the current inventory of your client.
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

###### Update inventory
Update the inventory of your client (with [ProductInventory][ProductInventory]).

```php
$productRepository->putInventory($productInventory);
```

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

###### Update prices
Update the retail prices of your client (with [ProductPriceUpdate][ProductPriceUpdate])

```php
$productRepository->putPrices($productPriceUpdate);
```

[ProductOptions]: ../Helpers/ProductOptions.md
[InventoryOptions]: ../Helpers/InventoryOptions.md
[PriceOptions]: ../Helpers/PriceOptions.md
[ProductInventory]: ../Models/ProductInventory.md
[ProductPriceUpdate]: ../Models/ProductPriceUpdate.md
