<?php

namespace MyPromo\Connect\SDK\Exceptions;

use Exception;
use Throwable;

/**
 * Class ApiResponseException
 * @package MyPromo\Connect\SDK\Exceptions
 * Thrown when something went wrong in the design process
 */
class ApiResponseException extends Exception
{
    /**
     * @var array
     */
    protected $responseBody;

    /**
     * @var int
     */
    protected $code;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", int $code = 0, Throwable $previous = null)
    {
        $this->responseBody = json_decode($message);

        parent::__construct($this->responseBody->message, $code, $previous);
    }

    /**
     * @return string
     */
    public function isSuccess(): string
    {
        return $this->responseBody->success;
    }

    /**
     * @return array
     */
    public function getErrors(): ?array
    {
        return $this->responseBody->errors;
    }
}
