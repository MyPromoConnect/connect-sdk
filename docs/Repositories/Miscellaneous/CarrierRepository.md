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

Carriers can be filtered/paginated with the helper [CarrierOptions][CarrierOptions].

```php
$carrierOptions = new \MyPromo\Connect\SDK\Helpers\Miscellaneous\CarrierOptions();
$carrierRepository->all($carrierOptions);
```

[CarrierOptions]: ../../Helpers/Miscellaneous/CarrierOptions.md