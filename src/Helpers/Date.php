<?php

namespace Connect\SDK\Helpers;

use DateTimeInterface;
use InvalidArgumentException;

/**
 * Class Date
 * @package Connect\SDK\Helpers
 */
class Date
{
    /**
     * @param DateTimeInterface $date
     */
    public static function validate($date)
    {
        if (!$date instanceof DateTimeInterface) {
            $type      = is_object($date) ? get_class($date) : gettype($date);
            $interface = DateTimeInterface::class;

            throw new InvalidArgumentException("Argument is of type or class {$type} but needs to be instance of {$interface}");
        }
    }
}
