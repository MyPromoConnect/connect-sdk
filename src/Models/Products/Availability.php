<?php

namespace MyPromo\Connect\SDK\Models\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class Availability implements Arrayable
{
    /**
     * @var string
     */
    protected $sku;

    /**
     * @var bool
     */
    protected $available;

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param bool $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'sku' => $this->sku,
            'available' => $this->available
        ];
    }
}
