#### Create a new Repository
```php
$designRepository = new \MyPromo\Connect\SDK\Repositories\Designs\DesignRepository($client);
```

#### Available Methods

###### Create Design
Create a new design (with [Design][Design])
```php
$design = new \MyPromo\Connect\SDK\Models\Design();
...
$designRepository->create($design);
```

###### Submit Design
Submit a design. 

```php
$designRepository->submit($design->getId());
```

###### Preview Design
Get a design preview and save it in a file.

```php
$designRepository->preview($design->getId(), "preview.pdf");
```



[Design]: ../Models/Design.md

