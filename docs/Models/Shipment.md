####Template-File for ProductionOrderRepository->addShipment().

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
```

Notes:  

* If you do not set any `setProductionOrderItems()` then the complete productionOrder will be set to shipped. 
* Use `setForce()` if you need to ship more qty than the ordered qty.
* The value for `setTrackingId()` is not allowed to be used again within 3 month for a specific carrier.


Required Models:

- [Shipment][Shipment]


[ProductionOrderRepository]: ../Repositories/ProductionOrderRepository.md
[Shipment]: Shipment.md
