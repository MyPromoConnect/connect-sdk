#### Create a new Repository
```php
$orderRepository = new \Connect\SDK\Repositories\Orders\OrderRepository($client);
```
Template-Files:
- [Order][Order]
- [OrderOptions][OrderOptions]
#### Available Methods

###### Create Order

```php
$order = new \Connect\SDK\Models\Order();
...
$orderRepository->create($order);
```

###### Submit Order

```php
$orderRepository->submit($order->getId());
```

###### Cancel Order

```php
$orderRepository->cancel($order->getId());
```

###### Find Order

```php
$orderRepository->find($order->getId());
```

###### Get all orders

```php
$orderOptions = new \Connect\SDK\Helpers\OrderOptions();
...

or

$orderOptions = [
    'from'         => 1,
    'per_page'     => 5,
    'created_from' => $date->format('Y-m-d'),
    'created_to'   => $date->format('Y-m-d'),
    'updated_from' => $date->format('Y-m-d'),
    'updated_to'   => $date->format('Y-m-d'),
];

$orderRepo->all($orderOptions);
```


[Order]: ../Models/Order.md
[OrderOptions]: ../Helpers/OrderOptions.md

