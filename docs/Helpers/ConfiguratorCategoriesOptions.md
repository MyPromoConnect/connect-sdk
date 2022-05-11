Helper class for `\MyPromo\Connect\SDK\Repositories\CategoriesRepository::all()`

Use this to filter results of categories for a specific client category tree.

```php
$configuratorCategoriesOptions = new \MyPromo\Connect\SDK\Helpers\ConfiguratorCategoriesOptions();
$configuratorCategoriesOptions->setLang('DE');
$configuratorCategoriesOptions->setClientId(2);
$configuratorCategoriesOptions->setEmpty(true|false);
$configuratorCategoriesOptions->setHidden(true|false);
```  
