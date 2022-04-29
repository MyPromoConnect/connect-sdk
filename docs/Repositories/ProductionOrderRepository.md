#### Create a new Production Order Repository
```php
$productionOrderRepository = new \MyPromo\Connect\SDK\Repositories\ProductionOrders\ProductionOrderRepository($client);
```

#### Available Methods

###### Find Order
Find a specific production order by id.
```php
$productionOrderRepository->find(1); // Pass id of production order
```

###### Get all production orders
Get all production orders for your client.  
Production Orders can be filtered/paginated with this helper: [ProductionOrderOptions]

```php
$productionOrderOptions = new \MyPromo\Connect\SDK\Helpers\ProductionOrderOptions();
...

or

$productionOrderOptions = [
    'page'         => 1,
    'per_page'     => 5,
    'created_from' => $date->format('Y-m-d'),
    'created_to'   => $date->format('Y-m-d'),
    'updated_from' => $date->format('Y-m-d'),
    'updated_to'   => $date->format('Y-m-d'),
];

$productionOrderRepository->all($productionOrderOptions);
```

###### Add Shipment
Add shipment to production order (with \MyPromo\Connect\SDK\Models\Shipment())

```php
$shipment = new \MyPromo\Connect\SDK\Models\Shipment();

$shipment->setCarrier('UPS');
$shipment->setTrackingId('132415XYZ');
$shipment->setHeight('30');
$shipment->setWidth('45');
$shipment->setDepth('20');
$shipment->setWeight('10000');
$shipment->setProductionOrderItems([
    ['id' => 1, 'quantity' => 5],   
    ['id' => 2, 'quantity' => 10]
    // ........
]);
$shipment->setForce(false);

$productionOrderId = 1; // ID of production order which you want to ship.
$productionOrderRepository->addShipment($productionOrderId, $shipment);

```

###### Generic Label
Get generic label of production order by id.
```php
$productionOrderRepository->genericLabel(1); // Pass id of production order id
```
[ProductionOrderOptions]: ../Helpers/ProductionOrderOptions.md

