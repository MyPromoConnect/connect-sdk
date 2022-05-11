Helper class for `\MyPromo\Connect\SDK\Repositories\Configurator\VariantsRepository::all()`

You can use this helper class to filter/paginate.

```php
$configuratorVariantOptions = new \MyPromo\Connect\SDK\Helpers\Configurator\VariantOptions();
$configuratorVariantOptions->setLang('DE'); // get data from this page number
$configuratorVariantOptions->setClientId($clientId); // public route - set client id
$configuratorVariantOptions->setCurrency('EUR');
$configuratorVariantOptions->setId(187); // e.g. if from options list 
$configuratorVariantOptions->setSku(null);
```
