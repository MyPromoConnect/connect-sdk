Optional callback for [Order][Order].

Order callback with basic authentication:
```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthUsername('username');
$callback->setAuthPassword('password');
```

Order callback with header authentication:
```php
$callback = new \MyPromo\Connect\SDK\Models\Callback();
$callback->setUrl('https://sample-shop.de/callback');
$callback->setAuthHeader('azVnvo0DtU6OVqa4SRUey2JfFIIzRt50');
```

[Order]: Order.md
