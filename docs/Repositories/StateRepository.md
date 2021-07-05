#### Create a new State Repository
```php
$stateRepository = new \MyPromo\Connect\SDK\Repositories\Miscellaneous\StateRepository($client);
```

#### Available Methods

###### Find State
Find a specific state by id.
```php
$stateRepository->find(1); // Pass state ID
```

###### Get all states
States can be filtered/paginated with this helper: \MyPromo\Connect\SDK\Helpers\StateOptions()

```php
$stateOptions = new \MyPromo\Connect\SDK\Helpers\StateOptions();
...

or

$stateOptions = [
    'from'         => 1,
    'per_page'     => 5,
];

$stateRepository->all($stateOptions);
```

[StateOptions]: ../Helpers/StateOptions.md

