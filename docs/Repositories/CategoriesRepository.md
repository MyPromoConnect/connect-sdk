### Create a new Repository

```php
$categoriesRepository = new \MyPromo\Connect\SDK\Repositories\Configurator\CategoriesRepository($client);
```

###### Get categories

Set options with [ConfiguratorCategoriesOptions][ConfiguratorCategoriesOptions]

```php
$configuratorCategoriesOptions = new \MyPromo\Connect\SDK\Helpers\ConfiguratorCategoriesOptions();

$categoriesRepository->all($configuratorCategoriesOptions);
```

[ConfiguratorCategoriesOptions]: ../Helpers/ConfiguratorCategoriesOptions.md