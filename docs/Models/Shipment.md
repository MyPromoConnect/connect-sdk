####Template-File for ProductionOrderRepository->putPrices().

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

// To Get Array
$shipment->toArray();
```

Required Models:

- \MyPromo\Connect\SDK\Models\Shipment()

[ProductionOrderRepository]: ../Repositories/ProductionOrderRepository.md
[Shipment]: Shipment.md
