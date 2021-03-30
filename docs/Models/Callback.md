Optional callback for [Order][Order].

###### Order callback with basic authentication:

```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthType('basic');
$callback->setAuthUsername('username');
$callback->setAuthPassword('password');
```

###### Order callback with header authentication:

```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthType('header');
$callback->setAuthHeader([
	'key' => 'Authorization',
	'value' => 'azVnvo0DtU6OVqa4SRUey2JfFIIzRt50',
]);
```

###### Order callback with oauth1 authentication:

```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthType('oauth1');
$callback->setAuthUrl('https://sample-shop.de/oauth/token');
$callback->setAuthUsername('username');
$callback->setAuthPassword('password');
```

###### Order callback with oauth2 authentication(password grant):

```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthType('oauth2');
$callback->setAuthUrl('https://sample-shop.de/oauth/token');
$callback->setAuthGrantType('password_grant');
$callback->setAuthUsername('username');
$callback->setAuthPassword('password');
```

###### Order callback with oauth2 authentication(client credentials):

```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthType('oauth2');
$callback->setAuthUrl('https://sample-shop.de/oauth/token');
$callback->setAuthGrantType('client_credentials');
$callback->setAuthClientId('client_id');
$callback->setAuthSecret('secret');
```

[Order]: Order.md
