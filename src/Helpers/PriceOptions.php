<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 13:16
 */

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class PriceOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $from;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $shippingFrom;

    /**
     * @var string
     */
    protected $skuFulfiller;

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
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
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
        return $this->shippingFrom;
    }

    /**
     * @param string $shippingFrom
     */
    public function setShippingFrom($shippingFrom)
    {
        $this->shippingFrom = $shippingFrom;
    }

    /**
     * @return string
     */
    public function getSkuFulfiller()
    {
        return $this->skuFulfiller;
    }

    /**
     * @param string $skuFulfiller
     */
    public function setSkuFulfiller($skuFulfiller)
    {
        $this->skuFulfiller = $skuFulfiller;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
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
            'page'          => $this->page,
            'per_page'      => $this->perPage,
            'sku'           => $this->sku,
        ];

        if (isset($this->skuFulfiller)) {
            $array['sku_fulfiller'] = $this->skuFulfiller;
        }

        if (isset($this->shippingFrom)) {
            $array['shipping_from'] = $this->shippingFrom;
        }

        return $array;
    }
}
