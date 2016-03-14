<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Exceptions;

use Exception;

/**
 * Class InsufficientFundsException.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class InsufficientFundsException extends Exception
{
    /**
     * InsufficientFundsException constructor.
     *
     * @param string    $type
     * @param int       $id
     * @param Exception $credits
     */
    public function __construct($type, $id, $credits)
    {
        $credits = abs($credits);

        $type = get_class($type);

        parent::__construct("Entity [{$type}] with ID [{$id}] is missing [{$credits}] credits.");
    }
}
