<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 12:44
 */

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductOptions implements Arrayable
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
    protected $shipping_from;

    /**
     * @var string
     */
    protected $search;

    /**
     * @var bool
     */
    protected $available;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $currency;

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
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param string $search
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param bool $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
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
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'from'          => $this->from,
            'per_page'      => $this->per_page,
            'shipping_from' => $this->shipping_from,
            'search'        => $this->search,
            'available'     => $this->available,
            'sku'           => $this->sku,
            'lang'          => $this->lang,
            'currency'      => $this->currency
        ];
    }
}
