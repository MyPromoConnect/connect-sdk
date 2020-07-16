Template-File for [DesignRepository->create()][DesignRepository]

```php
$design = new \MyPromo\Connect\SDK\Models\Design();
$design->setUserHash('Hash String');
$design->setReturnUrl('https...');
$design->setCancelUrl('https...');
$design->setSku('EXAMPLE-SKU');
$design->setIntent('EXAMPLE-INTENT (upload/customize)');
$design->setOptions([
    'example-key' => 'example-value'
]);
```

Options are optionals.

[DesignRepository]: ../Repositories/DesignRepository.md
