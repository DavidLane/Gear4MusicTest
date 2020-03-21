<?php

namespace App;

use App\Exceptions\UnassignedCourierException;
use Exception;

/**
 * Class Batch
 * @package App
 */
class Batch
{
    private $courier;
    private $consignments;

    public function __construct(?CourierInterface $courier)
    {
        if ($courier) {
            $this->courier = $courier;
        }

        $this->consignments = [];
    }

    public function setCourier(CourierInterface $courier)
    {
        $this->courier = $courier;
    }

    public function endBatch() : bool
    {
        if ($this->courier) {
            return $this->courier->dispatchBatch($this);
        }

        throw new UnassignedCourierException;
    }

    public function addConsignment(Consignment $consignment) : array
    {
        if ($this->courier) {
            $uniqueId = $this->courier->getConsignmentUniqueId();
            $consignment->setUniqueId($uniqueId);
            $this->consignments[] = $consignment;

            return $this->consignments;
        }

        throw new UnassignedCourierException;
    }

}