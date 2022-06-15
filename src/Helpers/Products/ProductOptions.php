<?php

namespace MyPromo\Connect\SDK\Helpers\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $page;

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
     * @var bool
     */
    protected $test_product;

    /**
     * @var bool
     */
    protected $include_variants;

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
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage(int $per_page)
    {
        $this->per_page = $per_page;
    }

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
     * @return string|null
     */
    public function getSearch(): ?string
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
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     */
    public function setAvailable(bool $available)
    {
        $this->available = $available;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
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
     * @return bool
     */
    public function isTestProduct(): bool
    {
        return $this->test_product;
    }

    /**
     * @param bool $test_product
     */
    public function setTestProduct(bool $test_product)
    {
        $this->test_product = $test_product;
    }

    /**
     * @return bool
     */
    public function getIncludeVariants(): bool
    {
        return $this->include_variants;
    }

    /**
     * @param bool $include_variants
     */
    public function setIncludeVariants(bool $include_variants)
    {
        $this->include_variants = $include_variants;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page'             => $this->page ? $this->page : 1,
            'per_page'         => $this->per_page,
            'pagination'       => $this->pagination,
            'shipping_from'    => $this->shipping_from,
            'search'           => $this->search,
            'available'        => $this->available,
            'sku'              => $this->sku,
            'lang'             => $this->lang,
            'currency'         => $this->currency,
            'test_product'     => $this->test_product,
            'include_variants' => $this->include_variants,
        ];
    }
}
