<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class ProductExportFilterOptions
 * @package MyPromo\Connect\SDK\Helpers
 */
class ProductExportFilterOptions implements Arrayable
{
    /**
     * @var string
     */
    protected $shipping_from;

    /**
     * @var string|null
     */
    protected $sku;

    /**
     * @var string|null
     */
    protected $search;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $product_types;

    const ProductExportFilterOptionsProductTypeAll = "all";
    const ProductExportFilterOptionsProductTypeNormal = "normal";
    const ProductExportFilterOptionsProductTypeTest = "test";

    /**
     * @var string|null
     */
    protected $category_id;

    /**
     * @return string
     */
    public function getShippingFrom(): string
    {
        return $this->shipping_from;
    }

    /**
     * @param string $shipping_from
     */
    public function setShippingFrom(string $shipping_from)
    {
        $this->shipping_from = $shipping_from;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku(?string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    /**
     * @param string|null $category_id
     */
    public function setCategoryId(?string $category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     */
    public function setSearch(?string $search)
    {
        $this->search = $search;
    }

    /**
     * @return string
     */
    public function getProductTypes(): string
    {
        return $this->product_types;
    }

    /**
     * @param string $product_types
     */
    public function setProductTypes(string $product_types)
    {
        $this->product_types = $product_types;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'shipping_from' => $this->shipping_from,
            'product_types' => $this->product_types,
            'search' => $this->search,
            'category_id' => $this->category_id,
            'currency' => $this->currency,
            'lang' => $this->lang,
        ];
    }
}
