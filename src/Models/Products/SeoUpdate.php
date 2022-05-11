<?php

namespace MyPromo\Connect\SDK\Models\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\Callback;

class SeoUpdate implements Arrayable
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

        if (!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
