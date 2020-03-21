<?php

namespace App;

/**
 * Class Consignment
 * @package App
 */
class Consignment
{
    /**
     * @var string;
     */
    private $uniqueId;

    /**
     * @param string $uniqueId
     */
    public function setUniqueId(string $uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }
}