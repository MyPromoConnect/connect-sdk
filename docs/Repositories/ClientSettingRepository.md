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

###### Update client settings
Update client settings (with [ClientSetting][ClientSetting])
```php
$clientSettings = new \MyPromo\Connect\SDK\Models\ClientSetting();
...
$clientSettingRepository->update($clientSettings);
```

[ClientSetting]: ../Models/ClientSetting.md