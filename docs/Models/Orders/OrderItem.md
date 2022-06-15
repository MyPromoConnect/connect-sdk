Template-File for [OrderItemRepository->submit()][OrderItemRepository].

```php
// set file
$orderItem = new \MyPromo\Connect\SDK\Models\Orders\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setComment('comment for order item here');
$orderItem->setCustoms($customs);

$orderItem->setFiles($file);
```

```php
// set design
$orderItem = new \MyPromo\Connect\SDK\Models\Orders\OrderItem();
$orderItem->setReference('your-reference');
$orderItem->setQuantity(35);
$orderItem->setOrderId($order->getId());
$orderItem->setSku('product-sku');
$orderItem->setComment('comment for order item here');
$orderItem->setCustoms($customs);

$orderItem->setDesigns($design);
```

```php
// To add service item mention order_item_id in relation
$orderItemRelation = new \MyPromo\Connect\SDK\Models\Orders\OrderItemRelation();
$orderItemRelation->setOrderItemId($relation);
```

```php
// To set relation pass object of orderItemRelation after setting up order_item_id
// which is added previously in order
$orderItem->setRelation($orderItemRelation);
```

Notes:

* Item comment is optional and just available on request
* Service items with  [OrderItemRelation][OrderItemRelation] are just acvailable on request

Required Models:

* [File][File]
* [Design][Design]

Optional:

* [Custom][Customs]
* [CustomProperty][CustomProperty]
* [OrderItemRelation][OrderItemRelation]

[File]: ../File.md

[Design]: ../Designs/Design.md

[Customs]: Customs.md

[CustomProperty]: ../CustomProperty.md

[OrderItemRelation]: OrderItemRelation.md

[OrderItemRepository]: ../../Repositories/Orders/OrderItemRepository.md
