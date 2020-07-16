<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 11:35
 */

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductInventory implements Arrayable
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
     * @return callable
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

        if(!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
