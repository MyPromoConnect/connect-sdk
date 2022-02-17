Template-File for [ClientSettingRepository->create()][ClientSettingRepository]

```php
$clientSettings = new \MyPromo\Connect\SDK\Models\ClientSettingMerchant();

$clientSettings->setActivateNewFulfiller('true|false');
$clientSettings->setActivateNewProducts('true|false');

$clientSettings->setHasToSupplyCarrier('true|false');
$clientSettings->setHasToSupplyTrackingCode('true|false');

$clientSettings->setPriceResetLogic(1);
$clientSettings->setAdjustMaxUpPercentage(0);
$clientSettings->setAdjustMaxDownPercentage(0);

$clientSettings->getSentToProductionDelay(1);

```

[ClientSettingRepository]: ../Repositories/ClientSettingRepository.md
