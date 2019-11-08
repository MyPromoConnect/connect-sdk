<?php

namespace Connect\SDK\Models;

use Connect\SDK\Contracts\Arrayable;

/**
 * Class OrderItem
 * @package Connect\SDK\Models
 */
class OrderItem implements Arrayable
{
    /**
     * @var
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var Custom
     */
    protected $custom;

    /**
     * @var ...$files
     */
    protected $files;


    /**
     * @return int|null
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return Custom
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * @param Custom $custom
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
    }

    /**
     * @return array ...File
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File ...$files
     */
    public function setFiles(...$files)
    {
        $this->files = $files;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $files = [];

        /**
         * @var File $file
         */
        foreach ($this->files as $file) {
            $files[] = $file->toArray();
        }

        return [
            'reference' => $this->reference,
            'quantity'  => $this->quantity,
            'sku'       => $this->sku,
            'files'     => $files,
            'customs'   => $this->custom->toArray(),
        ];
    }
}
