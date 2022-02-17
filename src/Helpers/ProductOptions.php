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
    protected $page;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var string
     */
    protected $shippingFrom;

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
     * @var bool
     */
    protected $testProduct;

    /**
     * @var bool
     */
    protected $pagination;

    /**
     * @return bool
     */
    public function getPagination(): bool
    {
        return $this->pagination;
    }

    /**
     * @param bool $pagination
     */
    public function setPagination(bool $pagination)
    {
        $this->pagination = $pagination;
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
     * @return bool
     */
    public function isTestProduct()
    {
        return $this->testProduct;
    }

    /**
     * @param bool $testProduct
     */
    public function setTestProduct($testProduct)
    {
        $this->testProduct = $testProduct;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'page'          => $this->page,
            'from'          => $this->from,
            'per_page'      => $this->perPage,
            'pagination'    => $this->pagination,
            'shipping_from' => $this->shippingFrom,
            'search'        => $this->search,
            'available'     => $this->available,
            'sku'           => $this->sku,
            'lang'          => $this->lang,
            'currency'      => $this->currency,
            'test_product'  => $this->testProduct,
        ];
    }
}
