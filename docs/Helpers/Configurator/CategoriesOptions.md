Helper class for `\MyPromo\Connect\SDK\Repositories\Configurator\CategoriesRepository::all()`

You can use this helper class to filter/paginate.

```php

$configuratorCategoriesOptions = new \MyPromo\Connect\SDK\Helpers\Configurator\CategoriesOptions();
$configuratorCategoriesOptions->setLang('DE'); // get data from this page number
$configuratorCategoriesOptions->setClientId(2); // public route - set client id
$configuratorCategoriesOptions->setEmpty(false); // contains products or not
$configuratorCategoriesOptions->setHidden(true); // hidden by default, is last empty node or has just empty nodes
```
