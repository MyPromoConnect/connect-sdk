### Create a new Repository

```php
$categoriesRepository = new \MyPromo\Connect\SDK\Repositories\Configurator\CategoriesRepository($client);
```

###### Get category tree for a client of type merchant

Data can be filtered with the helper [CategoriesOptions][CategoriesOptions].

```php
$categoryOptions = new \MyPromo\Connect\SDK\Helpers\Configurator\CategoriesOptions();
$categoriesRepository->all($categoryOptions);
```

Notes:

* Configurator is just available for clients of type merchant!

[CategoriesOptions]: ../../Helpers/Configurator/CategoriesOptions.md