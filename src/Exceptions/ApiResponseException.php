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
     * @var bool
     */
    protected $isSuccess;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var mixed
     */
    protected $errors;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $responseBody = "", int $code = 0, Throwable $previous = null)
    {
        if (empty($responseBody)) {
            $this->isSuccess = false;
            $this->message = "General communication error with the API. Got no response body.";
            $this->errors = null;
        } else {
            $responseBodyDecoded = json_decode($responseBody);

            $this->isSuccess = $responseBodyDecoded->success;
            $this->message = $responseBodyDecoded->message;
            $this->errors = $responseBodyDecoded->errors;
        }

        parent::__construct($this->message, $code, $previous);
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * @return mixed
     */
    public function getErrors(): mixed
    {
        return $this->errors;
    }
}
