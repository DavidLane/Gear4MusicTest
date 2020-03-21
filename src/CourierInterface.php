<?php

namespace App;

interface CourierInterface
{
    public function dispatchBatch(Batch $batch) : bool;
    public function getConsignmentUniqueId() : string;
}