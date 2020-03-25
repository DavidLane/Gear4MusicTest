# Gear4MusicTest
Although I've added a `composer.json` file and added `phpunit` I've not had time to add or complete tests.

I had every intention but realised I'd have most certainly overstepped the time limit! Please ask if you wish to see
testing examples `:)`

I've added the majority of the commenting in `CourierInterface`, take a look there first!

Speaking of which, each Courier would need it's own class writing to extend the `CourierInterface`. I've not written
any concrete classes, but this is an example of how it would be implemented:

```
$courier = new RoyalMailCourier;
$royalMailDispatcher = new Dispatcher($courier);

$consignment = new Consignment;

$royalMailDispatcher->startBatch();
$royalMailDispatcher->addConsignment($consignment);
$royalMailDispatcher->endBatch();
```