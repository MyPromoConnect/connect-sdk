#### Create a new Repository
```php
$orderRepository = new \MyPromo\Connect\SDK\Repositories\Orders\OrderRepository($client);
```
Template-Files:
- 

#### Available Methods

###### Create Order
Create a new order (with [Order][Order])
```php
$order = new \MyPromo\Connect\SDK\Models\Order();
...
$orderRepository->create($order);
```

###### Submit Order
Submit an order and send it to production. 

```php
$orderRepository->submit($order->getId());
```

###### Cancel Order
Cancel an order which is not in production yet.
```php
$orderRepository->cancel($order->getId());
```

###### Find Order
Find a specific order by id.
```php
$orderRepository->find($order->getId());
```

###### Get all orders
Get all orders for your client.  
Orders can be filtered/paginated with this helper: [OrderOptions][OrderOptions]

```php
$orderOptions = new \MyPromo\Connect\SDK\Helpers\OrderOptions();
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

$orderRepository->all($orderOptions);
```


[Order]: ../Models/Order.md
[OrderOptions]: ../Helpers/OrderOptions.md

