Template-File for [OrderItemRepository][OrderItemRepository].

```php
$orderItem = new \MyPromo\Connect\SDK\Models\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setComment('comment for order item here');
$orderItem->setServices($services);
$orderItem->setRelation($relation);
$orderItem->setFiles($file);
$orderItem->setCustoms($customs);
```

Required Models: 
- [File][File]

Optional:
- [Custom][Customs]
- [CustomProperty][CustomProperty]
- [OrderService][OrderService]
- [OrderItemRelation][OrderItemRelation]

[File]: File.md
[Customs]: Customs.md
[OrderService]: OrderService.md
[CustomProperty]: CustomProperty.md
[OrderItemRelation]: OrderItemRelation.md
[OrderItemRepository]: ../Repositories/OrderItemRepository.md
