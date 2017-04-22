<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Exceptions;

use Exception;

class InvalidCreditTypeException extends Exception
{
    public function __construct($typeId)
    {
        parent::__construct("Credit Type with ID [{$typeId}] does not exist.");
    }
}
