#### Create a new locales Repository

```php
$localeRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\LocaleRepository($client);
```

#### Available Methods

###### Find Locale

Find a specific locale by id.

```php
$localeRepository->find(1); // Pass locale ID
```

###### Get all locales

Locales can be filtered/paginated with the helper [LocaleOptions][LocaleOptions].

```php
$options = new \MyPromo\Connect\SDK\Helpers\LocaleOptions();
$localeRepository->all($options);
```

[LocaleOptions]: ../../Helpers/Miscellaneous/LocaleOptions.md

