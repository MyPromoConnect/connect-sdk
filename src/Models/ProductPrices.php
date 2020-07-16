<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 10:37
 */

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductPrices implements Arrayable
{
    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var array
     */
    protected $salePrices = [];

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

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
     * @return array
     */
    public function getSalePrices()
    {
        return $this->salePrices;
    }

    /**
     * @param array $salePrices
     */
    public function setSalePrices($salePrices)
    {
        $this->salePrices = $salePrices;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $resultArray = [
            'sku' => $this->sku,
            'prices' => [
                'currency' => $this->currency,
                'sales_prices' => []
            ]
        ];

        foreach ($this->getSalePrices() as $salePrice) {
            $resultArray['prices']['sales_prices'][] = $salePrice->toArray();
        }

        return $resultArray;
    }
}
