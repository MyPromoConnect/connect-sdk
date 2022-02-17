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
Update merchant client settings (with [MerchantClientSetting][MerchantClientSetting])
```php
$clientSettings = new \MyPromo\Connect\SDK\Models\MerchantClientSetting();
...
$clientSettingRepository->update($clientSettings);
```

###### Update fulfiller client settings
Update fulfiller client settings (with [FulfillerClientSetting][FulfillerClientSetting])
```php
$clientSettings = new \MyPromo\Connect\SDK\Models\FulfillerClientSetting();
...
$clientSettingRepository->update($clientSettings);
```

[MerchantClientSetting]: ../Models/MerchantClientSetting.md
[FulfillerClientSetting]: ../Models/FulfillerClientSetting.md