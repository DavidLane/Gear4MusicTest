# Gear4MusicTest
Although I've added a `composer.json` file and added `phpunit` I've not had time to add or complete tests.

I had every intention but realised I'd have most certainly overstepped the time limit! Please ask if you wish to see
testing examples `:)`

I've added the majority of the commenting in `CourierInterface`, take a look there first!

```
$batch = new Batch;

$courier = new RoyalMailCourier;

$consignment = new Consignment;

$batch->setCourier($courier);

$batch->addConsignment($consignment);

$batch->endBatch();