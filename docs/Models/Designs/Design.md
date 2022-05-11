Template-File for [DesignRepository->create()][DesignRepository]

```php
$design = new \MyPromo\Connect\SDK\Models\Designs\Design();
$design->setEditorUserHash('Hash String');
$design->setReturnUrl('https...');
$design->setCancelUrl('https...');
$design->setSku('EXAMPLE-SKU');
$design->setQty(1);
$design->setIntent('EXAMPLE-INTENT (upload/customize)');
$design->setOptions([
    'example-key' => 'example-value'
]);
```

Notes:

* Options are optional.
* Qty is optional

[DesignRepository]: ../../Repositories/Designs/DesignRepository.md
