Template-File for [OrderRepository->create()][OrderRepository]

```php
$order = new \MyPromo\Connect\SDK\Models\Orders\Order();
$order->setReference('your-order-reference');
$order->setReference2('your-order-reference2');
$order->setComment('your comment for order here');
$order->setShipper($shipperAddress);
$order->setRecipient($recipientAddress);
$order->setExport($exportAddress);
$order->setInvoice($invoiceAddress);

# Optional parameters 
$order->setFakePreflight(true|false);
$order->setFakeShipment(true|false);
```

Notes:

* Order commect is optional and just available on request

Required:

- [Address][address]

Optional:

- [CustomProperty][CustomProperty]
- [Callback][callback]

[OrderRepository]: ../../Repositories/Orders/OrderRepository.md

[CustomProperty]: ../CustomProperty.md

[callback]: ../Callback.md

[address]: ../Address.md
