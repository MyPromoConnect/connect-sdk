[![Build Status](https://travis-ci.com/MyPromoConnect/connect-sdk.svg?branch=master)](https://travis-ci.com/MyPromoConnect/connect-sdk)
[![License](https://poser.pugx.org/mypromo/connect-sdk/license)](https://packagist.org/packages/mypromo/connectsdk)
[![Latest Stable Version](https://poser.pugx.org/mypromo/connect-sdk/v/stable)](https://packagist.org/packages/mypromo/connectsdk)
[![composer.lock](https://poser.pugx.org/mypromo/connect-sdk/composerlock)](https://packagist.org/packages/mypromo/connectsdk)

## Important Announcement

Starting with version 2.0 mypromo connect SDK will support `php 8.0` or higher only.
You should be able to use `php 7.4` on your own risk till end of 2022.
Please update your applications and environments accordingly.

## Important Changes
- added Trailing Slashes to all API Endpoints
- added OAuth 1.0 and OAuth 2.0 for files ([see details here](docs/Models/File.md))
- Support a custom baseUri for Client ([see details here](docs/README.md))
- Add `reference2`field to Order Model ([see details here](docs/Models/Order.md))
- use key/value for File/Callback Header Auth ([see details here](docs/Models/File.md)) and ([see details here](docs/Models/Callback.md))
- Set minimum PHP Version to 8.0
- Added product routes to manage product data
- Added product feeds
- Added configurator routes to build up your own personalization app
- Added client settings routes
- Added connector routes for magento 2.x and shopify integration

## Contents

- [Docs][Docs]
  - [Helpers][Helpers]
  - [Models][Models]
  - [Repositories][Repositories]

## Requirements
- PHP ^8.0

## Installation
```
composer require mypromo/connect-sdk
```

## Contributing

### Reporting Issues

When reporting issues, please fill out the included template as completely as possible.

### Security

If you discover any security related issues, please email `support@mypromo.com` instead of using the issue tracker.

### Tests

Running tests requires at least PHP Version `8.0` or higher.

## Version Guidance

| Version | Status     | Packagist           | Namespace    | Repo                | Docs                | PHP Version |
|---------|------------|---------------------|--------------|---------------------|---------------------| -------------|
| 1.x     | Deprecated | `mypromo/connectsdk` | `MyPromo\Connect\SDK` | [v1][repo] | [v1][Docs] |  \>= 7.3      |
| 2.x     | Latest     | `mypromo/connectsdk` | `MyPromo\Connect\SDK` | [v1][repo] | [v1][Docs] |  \>= 8.0      |

# License

The Connect SDK is open-source software licensed under the [MIT license][mit-link].

[repo]: https://github.com/MyPromoConnect/SDK
[mit-link]: https://opensource.org/licenses/MIT
[Docs]: docs
[Helpers]: docs/Helpers
[Models]: docs/Models
[Repositories]: docs/Repositories
