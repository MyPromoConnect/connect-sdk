<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 14:28
 */

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class InventoryOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $from;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $shipping_from;

    /**
     * @var string
     */
    protected $sku_fulfiller;

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param int $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
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
     * @return string
     */
    public function getShippingFrom()
    {
        return $this->shipping_from;
    }

    /**
     * @param string $shipping_from
     */
    public function setShippingFrom($shipping_from)
    {
        $this->shipping_from = $shipping_from;
    }

    /**
     * @return string
     */
    public function getSkuFulfiller()
    {
        return $this->sku_fulfiller;
    }

    /**
     * @param string $sku_fulfiller
     */
    public function setSkuFulfiller($sku_fulfiller)
    {
        $this->sku_fulfiller = $sku_fulfiller;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $array = [
            'from'          => $this->from,
            'per_page'      => $this->per_page,
            'sku'           => $this->sku
        ];

        if (isset($this->sku_fulfiller)) {
            $array['sku_fulfiller'] = $this->sku_fulfiller;
        }

        if (isset($this->shipping_from)) {
            $array['shipping_from'] = $this->shipping_from;
        }

        return $array;
    }
}
