#### Create a new Repository

```php
$orderItemRepository = new \MyPromo\Connect\SDK\Repositories\Orders\OrderItemRepository($client);
```

Template-Files:

- [OrderItem][OrderItem]

#### Available Methods

###### Submit Order

```php
$orderItem = new \MyPromo\Connect\SDK\Models\Orders\OrderItem();
...
$orderItemRepository->submit($orderItem);
```

[OrderItem]: ../../Models/Orders/OrderItem.md

