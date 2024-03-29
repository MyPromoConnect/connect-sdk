<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderItemException;

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
     * @var Customs
     */
    protected $customs;

    /**
     * @var ...$files
     */
    protected $files;

    /**
     * @var ...$relation
     */
    protected $relation;

    /**
     * @var CustomProperty[]
     */
    protected $customProperties = [];

    /**
     * @var ...$designs
     */
    protected $designs;

    /**
     * @var string|null
     */
    protected $comment = null;

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
     * @return Customs
     */
    public function getCustoms()
    {
        return $this->customs;
    }

    /**
     * @param Customs $customs
     */
    public function setCustoms($customs)
    {
        $this->customs = $customs;
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
     * @return array ...Relation
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * @param array ...$relation
     */
    public function setRelation(...$relation)
    {
        $this->relation = $relation;
    }

    /**
     * @return mixed
     */
    public function getDesigns()
    {
        return $this->designs;
    }

    /**
     * @param Design ...$designs
     */
    public function setDesigns(...$designs)
    {
        $this->designs = $designs;
    }

    /**
     * @return CustomProperty[]
     */
    public function getCustomProperties()
    {
        return $this->customProperties;
    }

    /**
     * @param CustomProperty[] $customProperties
     */
    public function setCustomProperties($customProperties)
    {
        $this->customProperties = $customProperties;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * {@inheritDoc}
     *
     * @throws OrderItemException
     */
    public function toArray(): array
    {
        $files   = [];
        $designs = [];

        $orderItemArray = [
            'reference' => $this->reference,
            'quantity'  => $this->quantity,
        ];

        if (!empty($this->customs)) {
            $orderItemArray['customs'] = $this->customs->toArray();
        }

        $relations = '';
        if ($this->relation) {
            /**
             * @var OrderItemRelation $relation
             */
            foreach ($this->relation as $relation) {
                $relations = $relation->toArray();
            }
        }

        if (!empty($relations)) {
            $orderItemArray['relation'] = $relations;
        }

        if ($this->files) {
            /**
             * @var File $file
             */
            foreach ($this->files as $file) {
                $files[] = $file->toArray();
            }
        }

        if (!empty($files)) {
            $orderItemArray['files'] = $files;
        }

        if ($this->designs) {
            /**
             * @var Design $design
             */
            foreach ($this->designs as $design) {
                $designs[] = $design->toArray();
            }
        }

        if (!empty($designs)) {
            $orderItemArray['designs'] = $designs;
        }

        /**
         * This is out of behavior for the normal ->toArray implementation
         * But we cannot allow to send designs and files to the API at the same time
         */
        if (!empty($designs) && !empty($files)) {
            throw new OrderItemException('You cannot use designs and files together.');
        }

        if (
            empty($designs)
        ) {
            $orderItemArray['sku'] = $this->sku;
        }

        if (!is_null($this->comment)) {
            $orderItemArray['comment'] = $this->comment;
        }

        $customPropertyArray = [];
        foreach ($this->customProperties as $customProperty) {
            $customPropertyArray[] = $customProperty->toArray();
        }

        if (!empty($customPropertyArray)) {
            $orderItemArray['custom_properties'] = $customPropertyArray;
        }

        return $orderItemArray;
    }
}
