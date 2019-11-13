#### Create a new Repository
```php
$designRepository = new \MyPromo\Connect\SDK\Repositories\Designs\OrderRepository($client);
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

[Design]: ../Models/Design.md

