<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class SeoOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $from;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var string
     */
    protected $sku;


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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'from'          => $this->from,
            'per_page'      => $this->perPage,
            'sku'           => $this->sku,
        ];
    }
}
