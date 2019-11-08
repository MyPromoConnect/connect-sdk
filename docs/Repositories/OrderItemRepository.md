#### Create a new Repository
```php
$orderItemRepository = new \MyPromo\Connect\SDK\Repositories\Orders\OrderItemRepository($client);
```

Template-Files:
- [OrderItem][OrderItem]

#### Available Methods

###### Submit Order

```php
$orderItem = new \MyPromo\Connect\SDK\Models\OrderItem();
...
$orderItemRepository->submit($orderItem);
```

[OrderItem]: ../Models/OrderItem.md

