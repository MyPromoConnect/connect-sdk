#### Create a new Repository
```php
$designRepository = new \MyPromo\Connect\SDK\Repositories\Designs\DesignRepository($client);
```

Template-Files:
- [Design][Design]

#### Available Methods

###### Create Design

```php
$design = new \MyPromo\Connect\SDK\Models\Design();
...
$response = $designRepository->create($design);
```
###### Submit Design

```php
$response = $designRepository->submit($designId);
```

[Design]: ../Models/Design.md

