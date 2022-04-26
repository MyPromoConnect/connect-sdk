Template-File for [OrderRepository->create()][OrderRepository]

```php
$order = new \MyPromo\Connect\SDK\Models\Order();
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

Required:

- [Address][address]


Optional:

- [CustomProperty][CustomProperty]
- [Callback][callback]


[OrderRepository]: ../Repositories/OrderRepository.md
[CustomProperty]: CustomProperty.md
[callback]: Callback.md
[address]: Address.md
