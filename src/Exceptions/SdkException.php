<?php

namespace MyPromo\Connect\SDK\Exceptions;

use Exception;
use Throwable;

/**
 * Class SdkException
 * @package MyPromo\Connect\SDK\Exceptions
 */
class SdkException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
