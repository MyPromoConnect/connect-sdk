<?php

namespace MyPromo\Connect\SDK\Helpers\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class InventoryOptionsMerchant implements Arrayable
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
    protected $sku;

    /**
     * @var string
     */
    protected $shipping_from;

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
    public function toArray(): array
    {
        $array = [
            'page'          => $this->page ? $this->page : 1,
            'per_page'      => $this->per_page,
            'pagination'    => $this->pagination,
            'shipping_from' => $this->shipping_from,
            'sku'           => $this->sku ? $this->sku : null,
        ];

        return $array;
    }
}
