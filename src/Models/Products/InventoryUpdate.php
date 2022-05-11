<?php

namespace MyPromo\Connect\SDK\Models\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\Callback;


class InventoryUpdate implements Arrayable
{
    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @var array
     */
    protected $productAvailabilities = [];

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
    public function getProductAvailabilities()
    {
        return $this->productAvailabilities;
    }

    /**
     * @param array $productAvailabilities
     */
    public function setProductAvailabilities($productAvailabilities)
    {
        $this->productAvailabilities = $productAvailabilities;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $dataArray = [];
        foreach ($this->productAvailabilities as $productAvailability) {
            $dataArray[] = $productAvailability->toArray();
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
