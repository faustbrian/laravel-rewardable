<?php

namespace DraperStudio\Rewardable\Exceptions;

use Exception;

class InvalidCreditTypeException extends Exception
{
    public function __construct($typeId)
    {
        parent::__construct("Credit Type with ID [{$typeId}] does not exist.");
    }
}
