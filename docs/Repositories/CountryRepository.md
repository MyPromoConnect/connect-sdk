#### Create a new Country Repository
```php
$countryRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\CountryRepository($client);
```

#### Available Methods

###### Find Country
Find a specific country by id.
```php
$countryRepository->find(1); // Pass country ID
```

###### Get all countries
Countries can be filtered/paginated with this helper: \MyPromo\Connect\SDK\Helpers\CountryOptions()

```php
$countryOptions = new \MyPromo\Connect\SDK\Helpers\CountryOptions();
...

or

$countryOptions = [
    'page'         => 1,
    'per_page'     => 5,
];

$countryRepository->all($countryOptions);
```

[CountryOptions]: ../Helpers/CountryOptions.md

