<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Exceptions;

use Exception;

class BlacklistedException extends Exception
{
    public function __construct($type, $id)
    {
        parent::__construct("Entity [{$type}] with ID [{$id}] is blacklisted.");
    }
}
