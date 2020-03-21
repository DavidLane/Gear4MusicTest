<?php

namespace App;

/**
 * Interface CourierInterface
 * @package App
 *
 * I've not added many comments to this project as I found myself essentially re-describing the variable
 * names I've used.
 *
 * I've used an Interface here as I believe this is the part of the project with the most change-able parts.
 * As I didn't know the specifics of what a Courier needed to do at this point I felt wrapping it up in an Interface
 * allowed the most flexibility with any behind the scenes work and would make it extensible.
 *
 * The downside to this is there's actually very little to show for it.
 *
 * Just to note I'd reached my understanding limits on how to propose these methods threw exceptions which would be
 * bubbled up and caught by the Batch class. I was aware that these methods are likely to wrap around services
 * that are likely to fail at some point (email/FTP/HTTP) and would need handling
 */
interface CourierInterface
{
    /**
     * @param Batch $batch
     * @return bool
     */
    public function dispatchBatch(Batch $batch) : bool;

    /**
     * @return string
     */
    public function getConsignmentUniqueId() : string;
}