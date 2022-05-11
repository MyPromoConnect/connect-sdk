<?php

namespace MyPromo\Connect\SDK\Models\Orders;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class OrderItemRelation
 * @package Connect\SDK\Models
 */
class OrderItemRelation implements Arrayable
{
    /**
     * @var int|null
     */
    protected $order_item_id;

    /**
     * @return int|null
     */
    public function getOrderItemId()
    {
        return $this->order_item_id;
    }

    /**
     * @param int|null $order_item_id
     */
    public function setOrderItemId($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'order_item_id' => $this->order_item_id
        ];
    }
}
