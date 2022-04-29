#### Create a new Carrier Repository
```php
$carrierRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\CarrierRepository($client);
```

#### Available Methods

###### Find Carrier
Find a specific carrier by id.
```php
$carrierRepository->find(1); // Pass carrier ID
```

###### Get all carriers
Carriers can be filtered/paginated with this helper: \MyPromo\Connect\SDK\Helpers\CarrierOptions()

```php
$carrierOptions = new \MyPromo\Connect\SDK\Helpers\CarrierOptions();
...

or

$carrierOptions = [
    'page'         => 1,
    'per_page'     => 5,
];

$carrierRepository->all($carrierOptions);
```

[CarrierOptions]: ../Helpers/CarrierOptions.md

