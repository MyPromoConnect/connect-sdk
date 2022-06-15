Template-File for [ProductRepository->putInventory()][ProductRepository].

A ProductInventory object holds multiple instances of [ProductAvailability][ProductAvailability]
which represent the actual availability of a product.

```php
$productInventory = new \MyPromo\Connect\SDK\Models\Products\Inventory();

# Sample of $productAvailability array for client Fulfiller
$productAvailability = [
     "sku"=> "TESTPRODUCT123",
     "sku_fulfiller"=> "TEST Prod-26",
     "available"=> true,
     "stock"=> [
           "managed"=> true,
           "is_in_stock"=> true,
           "qty"=> 14500
         ]
];

    
# Sample of $productAvailability array for client Merchant
$productAvailability = [
     "sku"=> "TESTPRODUCT123",
     "available"=> true,
];


$productAvailabilities = [
    $productAvailability,
    ...
];

$productInventory->setProductAvailabilities($productAvailabilities);
```

Optional fields:

- [Callback][Callback]

[ProductRepository]: ../../Repositories/Products/ProductRepository.md

[ProductAvailability]: Availability.md

[Callback]: ../Callback.md
