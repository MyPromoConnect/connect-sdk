Template-File for [ProductRepository->putPrices()][ProductRepository].

A ProductPriceUpdate Object holds multiple [ProductPrices][ProductPrices] and optionally a [Callback][Callback].

```php
    $productPriceUpdate = new \MyPromo\Connect\SDK\Models\Products\PriceUpdate();

    # Sample of product price array for Fulfiller
    $productPrice = [
     "sku" => "TESTPRODUCT123",
     "sku_fulfiller" => "TEST Prod-123",
      "rules" => [
                "order_max_qty"=> 1000,
                "tier_price_qty_only"=> false
      ],
      "prices"=> [
                "currency" => "EUR",
                "buying_prices"=> [
                    [
                        "qty"=> 50,
                        "price"=> 14.99
                    ],
                    [
                        "qty"=> 100,
                        "price"=> 12.99
                    ],
                    [
                        "qty"=> 200,
                        "price"=> 9.99
                    ]
                ],
                "recommended_retail_prices"=> [
                    [
                        "qty"=> 50,
                        "price"=> 14.99
                    ],
                    [
                        "qty"=> 100,
                        "price"=> 12.99
                    ],
                    [
                        "qty"=> 200,
                        "price"=> 9.99
                    ]
                ]
            ]
    ];

    # Sample of product price array for Merchant
    $productPrice = [
    "sku"=> "TESTPRODUCT123",
    "prices"=> [
        "currency"=> "EUR",
        "retail_prices"=> [
                    [
                        "qty"=> 50,
                        "price"=> 100.99
                    ],
                    [
                        "qty"=> 100,
                        "price"=> 100.99
                    ],
                    [
                        "qty"=> 200,
                        "price"=> 14.99
                    ]
                ]
            ]
    ];

    $productPrices = [
        $productPrice,
        ...
    ];

    $productPriceUpdate->setProductPrices($productPrices);
```

Required Models:

- [Prices][Prices]

Optional:

- [Callback][Callback]

[ProductRepository]: ../../Repositories/Products/ProductRepository.md

[Callback]: ../Callback.md

[Prices]: Prices.md
