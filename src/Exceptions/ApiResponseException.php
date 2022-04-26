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
     * @var array
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
            $responseBodyDecoded = $this->convertObjectToArray(json_decode($responseBody));

            $this->isSuccess = $responseBodyDecoded['success'] ?? false;
            $this->message = $responseBodyDecoded['message'] ?? '';
            $this->errors = $responseBodyDecoded['errors'] ?? null;
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
     * @return array
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Convert object to array
     *
     * @return array
     */
    protected function convertObjectToArray($objectOrArray)
    {
        if (is_object($objectOrArray)) {
            $objectOrArray = (array)$objectOrArray;
        }

        // if not array -> just return it (probably string or number) :
        if (!is_array($objectOrArray)) {
            return $objectOrArray;
        }

        // if empty array -> return [] :
        if (count($objectOrArray) == 0) {
            return [];
        }

        // repeat tasks for each item :
        $output = [];
        foreach ($objectOrArray as $key => $o_a) {
            $output[$key] = self::convertObjectToArray($o_a);
        }

        return $output;
    }
}
