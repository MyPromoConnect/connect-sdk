Template-File for [OrderItem][OrderItem].

```php
$file = new \MyPromo\Connect\SDK\Models\File();
$file->setType('front');
$file->setUrl('fully-qualified-file-path');
```

Supported Filepath's:
- sFTP
- https

You also can add a basic authentication or a custom header for the
file if not set in the client settings.

```php
tbd
```

[OrderItem]: OrderItem.md
