Template-File for [DesignRepository->create()][DesignRepository]

```php
$design = new \MyPromo\Connect\SDK\Models\Design();
$design->setReturnUrl('https...');
$design->setCancelUrl('https...);
$design->setSku('EXAMPLE-SKU');
$design->setCustoms([
    'example-key' => 'example-value'
]);
```

There are no optionals.

[DesignRepository]: ../Repositories/DesignRepository.md
