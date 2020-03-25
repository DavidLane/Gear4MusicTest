<?php

namespace App\Couriers;

use App\Batch;
use App\CourierInterface;

class RoyalMailCourier implements CourierInterface
{
    public function dispatchBatch(Batch $batch): bool
    {
        // TODO: Implement dispatchBatch() method.
    }

    public function getConsignmentUniqueId(): string
    {
        // TODO: Implement getConsignmentUniqueId() method.
    }
}