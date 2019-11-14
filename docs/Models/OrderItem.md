Template-File for [OrderItemRepository][OrderItemRepository].

```php
$orderItem = new \MyPromo\Connect\SDK\Models\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setFiles($file);
$orderItem->setCustoms($customs);
```

Required Models: 
- [File][File]

Optional:
- [Custom][Customs]

[File]: File.md
[Customs]: Customs.md
[OrderItemRepository]: ../Repositories/OrderItemRepository.md
