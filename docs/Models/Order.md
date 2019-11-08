Template-File for [OrderRepository][OrderRepository].

```php
$order = new \Connect\SDK\Models\Order();
$order->setReference('your-order-reference');
$order->setShipper($shipper);
$order->setRecipient($recipient);
$order->setInvoice($invoice);
```

[OrderRepository]: ../Repositories/OrderRepository.md
