### Create a new Repository

```php
$optionsRepository = new \MyPromo\Connect\SDK\Repositories\Configurator\OptionsRepository($client);
```

###### Get category tree for a client of type merchant

Data can be filtered with the helper [OptionsOptions][OptionsOptions].

```php
$optionsOptions = new \MyPromo\Connect\SDK\Helpers\Configurator\OptionsOptions();
$optionsRepository->all($optionsOptions);
```

Notes:

* Configurator is just available for clients of type merchant!

[OptionsOptions]: ../../Helpers/Configurator/OptionsOptions.md