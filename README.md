[![Build Status](https://travis-ci.com/MyPromoConnect/connect-sdk.svg?branch=master)](https://travis-ci.com/MyPromoConnect/connect-sdk)
[![License](https://poser.pugx.org/mypromo/connect-sdk/license)](https://packagist.org/packages/mypromo/connectsdk)
[![Latest Stable Version](https://poser.pugx.org/mypromo/connect-sdk/v/stable)](https://packagist.org/packages/mypromo/connectsdk)
[![composer.lock](https://poser.pugx.org/mypromo/connect-sdk/composerlock)](https://packagist.org/packages/mypromo/connectsdk)

## Important Announcement

Mypromo Connect SDK will support `php 7.3` or higher only from 1st of March 2021.
Please update your applications and environments accordingly.

## Important Changes
- added Trailing Slashes to all API Endpoints
- added OAuth 1.0 and OAuth 2.0 for files ([see details here](docs/Models/File.md))
- Support a custom baseUri for Client ([see details here](docs/README.md))
- Add `reference2`field to Order Model ([see details here](docs/Models/Order.md))
- Set minium PHP Version to 7.3

## Contents

- [Docs][Docs]
  - [Helpers][Helpers]
  - [Models][Models]
  - [Repositories][Repositories]

## Requirements
- PHP >=5.6

## Contributing

#### Reporting Issues

When reporting issues, please fill out the included template as completely as possible.

#### Security

If you discover any security related issues, please email `support@mypromo.com` instead of using the issue tracker.

#### Tests

Running tests requires at least PHP Version `7.2` or higher.

## Version Guidance

| Version | Status     | Packagist           | Namespace    | Repo                | Docs                | PHP Version |
|---------|------------|---------------------|--------------|---------------------|---------------------| -------------|
| 1.x     | Latest     | `mypromo/connectsdk` | `MyPromo\Connect\SDK` | [v1][repo] | [v1][Docs] |  \>= 7.2      |

| Version | Status     | Packagist           | Namespace    | Repo                | Docs                | PHP Version |
|---------|------------|---------------------|--------------|---------------------|---------------------| -------------|
| 1.x     | Latest     | `mypromo/connectsdk` | `MyPromo\Connect\SDK` | [v1][repo] | [v1][Docs] |  \>= 7.2      |

# License

The Connect SDK is open-source software licensed under the [MIT license][mit-link].

[repo]: https://github.com/MyPromoConnect/SDK
[mit-link]: https://opensource.org/licenses/MIT
[Docs]: docs
[Helpers]: docs/Helpers
[Models]: docs/Models
[Repositories]: docs/Repositories
