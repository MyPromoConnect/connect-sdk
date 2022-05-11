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

Countries can be filtered/paginated with the helper [CountryOptions][CountryOptions].

```php
$countryOptions = new \MyPromo\Connect\SDK\Helpers\CountryOptions();
$countryRepository->all($countryOptions);
```

[CountryOptions]: ../../Helpers/Miscellaneous/CountryOptions.md
