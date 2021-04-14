Template-File for [OrderRepository->create()][OrderRepository]

```php
$order = new \MyPromo\Connect\SDK\Models\Order();
$order->setReference('your-order-reference');
$order->setReference2('your-order-reference2');
$order->setShipper($shipper);
$order->setRecipient($recipient);
$order->setExport($export);

# Optional parameters 
$order->setFakePreflight(true|false);
$order->setFakeShipment(true|false);
```

Optional:

- [CustomProperty][CustomProperty]
- [Callback][callback]

[OrderRepository]: ../Repositories/OrderRepository.md

[CustomProperty]: CustomProperty.md

[callback]: Callback.md
