<?php

namespace MyPromo\Connect\SDK\Helpers\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class PriceOptionsFulfiller implements Arrayable
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
    protected $sku_fulfiller;

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
            'page'       => $this->page ? $this->page : 1,
            'per_page'   => $this->per_page,
            'pagination' => $this->pagination,
            'sku'        => $this->sku,
        ];

        if (isset($this->sku_fulfiller)) {
            $array['sku_fulfiller'] = $this->sku_fulfiller;
        }

        return $array;
    }
}