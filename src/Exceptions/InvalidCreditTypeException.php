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
 * Class InvalidCreditTypeException.
 *
 * @author DraperStudio <hello@draperstudio.tech>
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
