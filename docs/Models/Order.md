Template-File for [OrderRepository->create()][OrderRepository]

```php
$order = new \MyPromo\Connect\SDK\Models\Order();
$order->setReference('your-order-reference');
$order->setShipper($shipper);
$order->setRecipient($recipient);
$order->setInvoice($invoice);
```

There are no optionals.

[OrderRepository]: ../Repositories/OrderRepository.md
