#### Create a new timezones Repository

```php
$timezoneRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\TimezoneRepository($client);
```

#### Available Methods

###### Find Timezone

Find a specific timezone by id.

```php
$timezoneRepository->find(1); // Pass timezone ID
```

###### Get all timezones

Timezones can be filtered/paginated with the helper [TimezoneOptions][TimezoneOptions].

```php
$options = new \MyPromo\Connect\SDK\Helpers\TimezoneOptions();
$timezoneRepository->all($options);
```

[TimezoneOptions]: ../../Helpers/Miscellaneous/TimezoneOptions.md

