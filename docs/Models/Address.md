There are multiple addresses needed to create an [Order][Order].
- Shipper (optional, if not set we use address assigned to your client)
- Recipient (mandatory)
- Export (optional, if not set we use address assigned to your client)
- Invoice (optional, if not set we use address assigned to your client)

Address object sample:

```php
$address = new \MyPromo\Connect\SDK\Models\Address();
$address->setAddressId(null);
$address->setAddressKey(null);
$address->setReference('your-reference-code');
$address->setCompany('Sample Company');
$address->setDepartment(null);
$address->setSalutation(null);
$address->setGender(null);
$address->setDateOfBirth(new \DateTime(date('Y-m-d H:i:s')));
$address->setFirstname('Sam');
$address->setMiddlename(null);
$address->setLastname('Sample');
$address->setStreet('Sample Street 1');
$address->setCareOf('Street Add');
$address->setZip(12345);
$address->setCity('Sample Town');
$address->setStateCode('NW');
$address->setDistrict('your-disctrict');
$address->setCountryCode('DE');
$address->setPhone('your-phone');
$address->setFax('your-fax');
$address->setMobile('your-mobile');
$address->setEmail('sam@sample.com');
$address->setVatId('DE1234567890');
$address->setEoriNumber('55555555555');
$address->setAccountHolder('account-holder');
$address->setIban('your-iban');
$address->setBicOrSwift('your-bic-or-swift');
$address->setCommercialRegisterEntry('your-commercial-register-entry');

```

[Order]: Order.md
