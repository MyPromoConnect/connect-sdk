There are multiple addresses needed to create an [Order][Order].
- Shipper
- Recipient
- Invoice

Example Address-Object:

```php
$address = new \Connect\SDK\Models\Address();
$address->setReference('your-reference-code');
$address->setCompany('Sample Company');
$address->setFirstname('Sam');
$address->setLastname('Sample');
$address->setStreet('Sample Street 1');
$address->setCareOf('Street Add');
$address->setZip(12345);
$address->setCity('Sample Town');
$address->setStateCode('NW');
$address->setDistrict('your-disctrict');
$address->setCountryCode('DE');
$address->setPhone('your-phone');
$address->setEmail('sam@sample.com');
$address->setCommercialRegisterEntry('your-commercial-register-entry');
$address->setIban('your-iban');
$address->setBicOrSwift('your-bic-or-swift');
$address->setAccountHolder('account-holder');
```

[Order]: Order.md
