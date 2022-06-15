<?php

namespace MyPromo\Connect\SDK\Models\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\Callback;

class PriceUpdate implements Arrayable
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
    public function getCallback(): Callback
    {
        return $this->callback;
    }

    /**
     * @param callable $callback
     */
    public function setCallback(Callback $callback)
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

        if (!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
