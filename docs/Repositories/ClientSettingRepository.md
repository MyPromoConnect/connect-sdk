### Create a new Repository

```php
$clientSettingRepository = new \MyPromo\Connect\SDK\Repositories\Client\ClientSettingRepository($client);
```

###### Get Client Settings

Get settings of client

```php
...
$clientSettingRepository->getSettings();
```

###### Update merchant client settings

Update merchant client settings (with [ClientSettingMerchant][ClientSettingMerchant])

```php
$clientSettings = new \MyPromo\Connect\SDK\Models\MerchantClientSetting();
...
$clientSettingRepository->setSettings($clientSettings);
```

###### Update fulfiller client settings

Update fulfiller client settings (with [ClientSettingFulfiller][ClientSettingFulfiller])

```php
$clientSettings = new \MyPromo\Connect\SDK\Models\FulfillerClientSetting();
...
$clientSettingRepository->setSettings($clientSettings);
```

[ClientSettingMerchant]: ../Models/ClientSettingMerchant.md

[ClientSettingFulfiller]: ../Models/ClientSettingFulfiller.md