Template-File for [OrderItem->setFiles(...)][OrderItem]

```php
$file = new \MyPromo\Connect\SDK\Models\File();
$file->setType('front');
$file->setUrl('fully-qualified-file-path');
```

Supported Filepath's:
- sFTP
- https

## Authentication
Supported:
- https basic user and password auth
- https header auth
- sftp user and password auth

This is also the order of authentication if you set everything.

###### https Basic Auth
```php
$file->setHttpsBasicAuthUser($user);
$file->setHttpsBasicAuthPassword($password);
```

###### https Header Auth
```php
$file->setHttpsHeader('Bearer Test');
```

###### sftp auth
```php
$file->setSftpUser($user);
$file->setSftpPassword($password);
```

[OrderItem]: OrderItem.md
