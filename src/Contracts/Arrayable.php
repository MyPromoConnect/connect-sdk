<?php

namespace Connect\SDK\Contracts;

/**
 * Interface Model
 * @package Connect\SDK\Contracts
 */
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}
