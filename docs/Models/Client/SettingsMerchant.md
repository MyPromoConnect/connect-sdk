Template-File for [ClientSettingRepository->create()][ClientSettingRepository]

```php
$clientSettingsMerchant = new \MyPromo\Connect\SDK\Models\Client\SettingsMerchant();

$clientSettingsMerchant->setActivateNewFulfiller(true|false);
$clientSettingsMerchant->setActivateNewProducts(true|false);

$clientSettingsMerchant->setHasToSupplyCarrier(true|false);
$clientSettingsMerchant->setHasToSupplyTrackingCode(true|false);

$clientSettingsMerchant->setPriceResetLogic(1); // allowed value 1-4
$clientSettingsMerchant->setAdjustMaxUpPercentage(0); // 0 = off
$clientSettingsMerchant->setAdjustMaxDownPercentage(0); // 0 = off

$clientSettingsMerchant->setSentToProductionDelay(1);

```

Notes:

* Price adjustment max
    * 0-100 %
    * 0=no limits
* Price reset logic
    * 1 (default) = Reset to recommended retail price, if buying price or recommended retail price have been changed
      from fulfiller
    * 2 = Reset to recommended_retail_price, if recommended_retail_price or buying_price increase by fulfiller
    * 3 = Reset to recommended_retail_price, if recommended_retail_price or buying_price decrease by fulfiller
    * 4 = Never adjust my prices automatically (keep my set sales_prices, regardless if buying price or recommended
      retail price have been changed from fulfiller)

[ClientSettingRepository]: ../../Repositories/Client/ClientSettingRepository.md
