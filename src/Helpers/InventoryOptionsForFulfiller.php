<?php
/**
 * Created by PhpStorm.
 * User: mypromo_ua
 * Date: 30.07.21
 * Time: 14:28
 */

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class InventoryOptionsForFulfiller implements Arrayable
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
        return [
            'from'          => $this->from,
            'per_page'      => $this->per_page,
            'sku'           => $this->sku,
            'sku_fulfiller' => $this->sku_fulfiller,
        ];
    }
}
