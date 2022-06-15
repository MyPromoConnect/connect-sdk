There are multiple addresses needed to create an [Order][Order].  

- Shipper (optional, if not set we use address assigned to your client)
- Recipient (mandatory)
- Export (optional, if not set we use address assigned to your client)
- Invoice (optional, if not set we use address assigned to your client)

Address object sample:

```php
$recipientAddress = new \MyPromo\Connect\SDK\Models\Address();
$recipientAddress->setAddressId(null);
$recipientAddress->setAddressKey(null);
$recipientAddress->setReference('your-reference-code');
$recipientAddress->setCompany('Sample Company');
$recipientAddress->setDepartment(null);
$recipientAddress->setSalutation(null);
$recipientAddress->setGender(null);
$recipientAddress->setDateOfBirth(new \DateTime(date('Y-m-d H:i:s')));
$recipientAddress->setFirstname('Sam');
$recipientAddress->setMiddlename(null);
$recipientAddress->setLastname('Sample');
$recipientAddress->setStreet('Sample Street 1');
$recipientAddress->setCareOf('Street Add');
$recipientAddress->setZip(12345);
$recipientAddress->setCity('Sample Town');
$recipientAddress->setStateCode('NW');
$recipientAddress->setDistrict('your-disctrict');
$recipientAddress->setCountryCode('DE');
$recipientAddress->setPhone('your-phone');
$recipientAddress->setFax('your-fax');
$recipientAddress->setMobile('your-mobile');
$recipientAddress->setEmail('sam@sample.com');
$recipientAddress->setVatId('DE1234567890');
$recipientAddress->setEoriNumber('55555555555');
$recipientAddress->setAccountHolder('account-holder');
$recipientAddress->setIban('your-iban');
$recipientAddress->setBicOrSwift('your-bic-or-swift');
$recipientAddress->setCommercialRegisterEntry('your-commercial-register-entry');

```

[Order]: Orders/Order.md
