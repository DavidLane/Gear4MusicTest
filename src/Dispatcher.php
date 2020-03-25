<?php

namespace App\Dispatchers;

use App\Batch;
use App\Consignment;
use App\CourierInterface;

class Dispatcher
{
    private $courier;
    private $batch;

    public function __construct(CourierInterface $courier)
    {
        $this->courier = $courier;
    }

    public function startBatch()
    {
        /**
         * In the real world I've only seen this handled by either a MessageQueue system
         * or persisted to a DB and then re-accessed through a MQ.
         *
         * In this example I've not persisted it but this is where it'd happen.
         */
        $this->batch = new Batch($this->courier);
    }

    public function endBatch()
    {
        $this->courier->dispatchBatch($this->batch);
    }

    public function addConsignment(Consignment $consignment)
    {
        /*
         * As above, this would also be where any persisting would happen
         */
        $this->batch->addConsignment($consignment);
    }
}