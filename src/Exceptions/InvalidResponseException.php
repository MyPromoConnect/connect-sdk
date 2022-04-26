<?php

namespace MyPromo\Connect\SDK\Exceptions;

use Exception;

/**
 * Class InvalidResponseException
 * @package MyPromo\Connect\SDK\Exceptions
 * Thrown when something went wrong in the design process
 */
class InvalidResponseException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function isSuccess(): string
    {
        return false;
    }

    /**
     * @return array
     */
    public function getErrors(): ?array
    {
        return null;
    }
}
