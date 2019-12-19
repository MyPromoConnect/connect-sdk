<?php
/**
 * @file          CustomProperty.php
 * @since         13.12.19, 09:56
 *
 * @copyright (c) 2019.
 * @author        Mohammad Abazid <mab@os-cillation.de>
 */

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class CustomProperty implements Arrayable
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }


    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'key'   => $this->key,
            'value' => $this->value,
        ];
    }
}
