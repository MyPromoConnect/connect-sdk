<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class Shipment implements Arrayable
{
    /**
     * @var string
     */
    protected $carrier;

    /**
     * @var string
     */
    protected $tracking_id;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $depth;

    /**
     * @var string
     */
    protected $weight;

    /**
     * @var array
     */
    protected $production_order_items = [];

    /**
     * @var bool
     */
    protected $force;

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return string
     */
    public function getTrackingId()
    {
        return $this->tracking_id;
    }

    /**
     * @param string $tracking_id
     */
    public function setTrackingId($tracking_id)
    {
        $this->tracking_id = $tracking_id;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param string $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return array
     */
    public function getProductionOrderItems()
    {
        return $this->production_order_items;
    }

    /**
     * @param array $production_order_items
     */
    public function setProductionOrderItems($production_order_items)
    {
        $this->production_order_items = $production_order_items;
    }

    /**
     * @return bool
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     * @param bool $force
     */
    public function setForce($force)
    {
        $this->force = $force;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'carrier'                   => $this->carrier,
            'tracking_id'               => $this->tracking_id,
            'height'                    => $this->height,
            'width'                     => $this->width,
            'depth'                     => $this->depth,
            'weight'                    => $this->weight,
            'production_order_items'    => $this->production_order_items,
            'force'                     => $this->force,
        ];
    }
}
