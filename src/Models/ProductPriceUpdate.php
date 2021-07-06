<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 12:33
 */

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductPriceUpdate implements Arrayable
{
    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @var array
     */
    protected $productPrices = [];

    /**
     * @return Callback
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param callable $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return array
     */
    public function getProductPrices()
    {
        return $this->productPrices;
    }

    /**
     * @param array $productPrices
     */
    public function setProductPrices($productPrices)
    {
        $this->productPrices = $productPrices;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $dataArray = [];
        foreach ($this->productPrices as $productPrice) {
            $dataArray[] = $productPrice->toArray();
        }

        $resultArray = [
            'data' => $dataArray
        ];

        if(!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
