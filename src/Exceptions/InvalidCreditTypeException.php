<?php

namespace DraperStudio\Rewardable\Exceptions;

use Exception;

/**
 * Class InvalidCreditTypeException.
 */
class InvalidCreditTypeException extends Exception
{
    /**
     * InvalidCreditTypeException constructor.
     *
     * @param string $typeId
     */
    public function __construct($typeId)
    {
        parent::__construct("Credit Type with ID [{$typeId}] does not exist.");
    }
}
