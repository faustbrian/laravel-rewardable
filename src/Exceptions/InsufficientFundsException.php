<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
{
    public function __construct($type, $id, $credits)
    {
        $credits = abs($credits);

        $type = get_class($type);

        parent::__construct("Entity [{$type}] with ID [{$id}] is missing [{$credits}] credits.");
    }
}
