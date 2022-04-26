<?php

namespace MyPromo\Connect\SDK\Exceptions;

use Exception;
use Throwable;

/**
 * Class ProductExportException
 * @package MyPromo\Connect\SDK\Exceptions
 *          Thrown when something went wrong in the design process
 */
class ProductExportException extends Exception
{
    /**
     * @var array
     */
    protected $responseBody;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->responseBody = json_decode($previous->getMessage());
    }

    /**
     * @return array
     */
    public function getApiResponse(): array
    {
        return $this->responseBody;
    }

    /**
     * @return string
     */
    public function getApiResultSuccess(): string
    {
        return $this->responseBody->success;
    }

    /**
     * @return string
     */
    public function getApiResultMessage(): string
    {
        return $this->responseBody->message;
    }

    /**
     * @return array
     */
    public function getApiResultErrors(): array
    {
        return $this->responseBody->errors;
    }
}
