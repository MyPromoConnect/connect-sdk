<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;

class ProductSeoUpdate implements Arrayable
{
    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @var array
     */
    protected $productSeo = [];

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
    public function getProductSeo()
    {
        return $this->productSeo;
    }

    /**
     * @param array $productSeo
     */
    public function setProductSeo($productSeo)
    {
        $this->productSeo = $productSeo;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     * @throws OrderException
     */
    public function toArray()
    {
        $dataArray = [];
        foreach ($this->productSeo as $seo) {
            $dataArray[] = $seo->toArray();
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
