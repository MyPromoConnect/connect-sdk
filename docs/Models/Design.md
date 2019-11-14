Template-File for [DesignRepository->create()][DesignRepository]

```php
$design = new \MyPromo\Connect\SDK\Models\Design();
$design->setReturnUrl('https...');
$design->setCancelUrl('https...');
$design->setSku('EXAMPLE-SKU');
$design->setOptions([
    'example-key' => 'example-value'
]);
```

Options are optionals.

[DesignRepository]: ../Repositories/DesignRepository.md
