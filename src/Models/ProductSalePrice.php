<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 11:32
 */

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductSalePrice implements Arrayable
{
    /**
     * @var int
     */
    protected $tierQuantity;

    /**
     * @var float
     */
    protected $price;

    /**
     * @return int
     */
    public function getTierQuantity()
    {
        return $this->tierQuantity;
    }

    /**
     * @param int $tierQuantity
     */
    public function setTierQuantity($tierQuantity)
    {
        $this->tierQuantity = $tierQuantity;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'price' => $this->price,
            'qty'   => $this->tierQuantity
        ];
    }
}
