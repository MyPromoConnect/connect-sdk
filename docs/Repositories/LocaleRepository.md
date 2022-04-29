#### Create a new locales Repository
```php
$localeRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\LocaleRepository($client);
```

#### Available Methods

###### Get all locales
Locales can be filtered/paginated with this helper: \MyPromo\Connect\SDK\Helpers\LocaleOptions()

```php
$options = new \MyPromo\Connect\SDK\Helpers\LocaleOptions();
...

or

$options = [
    'page'         => 1,
    'per_page'     => 5,
    'pagination'   => 5,
];

$localeRepository->all($options);
```

[LocaleOptions]: ../Helpers/LocaleOptions.md

