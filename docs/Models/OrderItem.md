Template-File for [OrderItemRepository][OrderItemRepository].

```php
$orderItem = new \MyPromo\Connect\SDK\Models\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setComment('comment for order item here');
$orderItem->setFiles($file);
$orderItem->setCustoms($customs);
$orderItem->setServices($services);

# To add service item mention order_item_id in relation
$orderItemRelation = new \MyPromo\Connect\SDK\Models\OrderItemRelation();
$orderItemRelation->setOrderItemId($relation);

// To set relation pass object of orderItemRelation after setting up order_item_id which is added previously in order
$orderItem->setRelation($orderItemRelation);
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
