#### Create a new timezones Repository
```php
$timezoneRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\TimezoneRepository($client);
```

#### Available Methods

###### Get all timezones
Timezones can be filtered/paginated with this helper: \MyPromo\Connect\SDK\Helpers\TimezoneOptions()

```php
$options = new \MyPromo\Connect\SDK\Helpers\TimezoneOptions();
...

or

$options = [
    'from'         => 1,
    'page'         => 1,
    'per_page'     => 5,
    'pagination'   => 5,
];

$timezoneRepository->all($options);
```

[TimezoneOptions]: ../Helpers/TimezoneOptions.md

