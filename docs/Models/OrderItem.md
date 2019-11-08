Template-File for [OrderItemRepository][OrderItemRepository].

```php
$orderItem = new \Connect\SDK\Models\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setFiles($file);
$orderItem->setCustom($custom);
```

Required Models: 
- [File][File]

Optional:
- [Custom][Custom]

[File]: File.md
[Custom]: Custom.md
[OrderItemRepository]: ../Repositories/OrderItemRepository.md
