Helper class for `\Connect\SDK\Repositories\OrderRepository::all()`

```php
$orderOptions = new \Connect\SDK\Helpers\OrderOptions();
$orderOptions->setFrom(1);
$orderOptions->setPerPage(5);
$orderOptions->setCreatedFrom(new DateTime('date'));
$orderOptions->setCreatedTo(new DateTime('date'));
$orderOptions->setUpdatedFrom(new DateTime('date'));
$orderOptions->setUpdatedTo(new DateTime('date'));
```
