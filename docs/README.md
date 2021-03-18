## Getting started

#### Installation

The recommended way to install Connect SDK is through [Composer][Composer].

Run the Composer command to install the latest stable version of Connect SDK:

```
composer require mypromo/connectsdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

#### Usage

Everything is build around the `\MyPromo\Connect\SDK\Client`.  
Every [Repository][Repository] will return the response as an array on success.  
On failure it will throw an exception.

###### Create a new client

```php
$client = new \MyPromo\Connect\SDK\Client($productionCode, $clientId, $clientSecret, $baseUri, $forceNewToken)
```

###### Constructor Parameters

```php
int     $productionCode // Set your environment (0=Sandbox, 1=Live, 2=Stage)
int     $clientId       // Set your client-id provided by connect
string  $clientSecret   // Set your client-secret provided by connect
string  $baseUri        // Set your custom baseUri (e.g. for own dev server), it's optional and will override `productionCode` parameter
string  $forceNewToken  // Force SDK to create new token for your client (Optional feature) can be used in case of DB updated and old token is stored in cache so you can use force to generate new token
```

###### Available Client-Methods

- `$client->auth()`
- `$client->status()`

From here on you are able to use the repositories which require a functioning `\MyPromo\Connect\SDK\Client`.

- [OrderRepository][orderRepository]
- [OrderItemRepository][orderItemRepository]

[Composer]: https://getcomposer.org/

[orderRepository]: Repositories/OrderRepository.md

[orderItemRepository]: Repositories/OrderItemRepository.md

[Repository]: Repositories
