<?php

namespace App;

class Consignment
{
    private $uniqueId;

    public function setUniqueId(string $uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }
}