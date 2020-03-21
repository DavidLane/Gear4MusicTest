<?php

namespace App;

use App\Exceptions\UndefinedCourierException;

/**
 * Class Batch
 * @package App
 */
class Batch
{
    /**
     * @var CourierInterface|null
     */
    private $courier;

    /**
     * @var array
     */
    private $consignments;

    /**
     * @param CourierInterface|null $courier
     */
    public function __construct(?CourierInterface $courier)
    {
        if ($courier) {
            $this->setCourier($courier);
        }

        $this->consignments = [];
    }

    /**
     * @param CourierInterface $courier
     */
    public function setCourier(CourierInterface $courier)
    {
        $this->courier = $courier;
    }

    /**
     * As per the comments in CourierInterface, this method should potentially catch or bubble up exceptions
     * from the Courier
     *
     * @return bool
     * @throws UndefinedCourierException
     */
    public function endBatch() : bool
    {
        if ($this->courier) {
            return $this->courier->dispatchBatch($this);
        }

        throw new UndefinedCourierException;
    }

    /**
     * As above, this method should potentially catch or bubble up exceptions from the Courier
     *
     * @param Consignment $consignment
     * @return array
     * @throws UndefinedCourierException
     */
    public function addConsignment(Consignment $consignment) : array
    {
        if ($this->courier) {
            $uniqueId = $this->courier->getConsignmentUniqueId();
            $consignment->setUniqueId($uniqueId);
            $this->consignments[] = $consignment;

            return $this->consignments;
        }

        throw new UndefinedCourierException;
    }

}