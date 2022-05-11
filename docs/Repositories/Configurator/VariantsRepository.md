### Create a new Repository

```php
$variantRepository = new \MyPromo\Connect\SDK\Repositories\Configurator\VariantRepository($client);
```

###### Get category tree for a client of type merchant

Data can be filtered with the helper [VariantOptions][VariantOptions].

```php
$variantOptions = new \MyPromo\Connect\SDK\Helpers\Configurator\VariantOptions();
$variantRepository->all($variantOptions);
```

Notes:

* Configurator is just available for clients of type merchant!

[VariantOptions]: ../../Helpers/Configurator/VariantOptions.md