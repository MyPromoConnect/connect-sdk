<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;

/**
 * Class Order
 * @package Connect\SDK\Models
 */
class Order implements Arrayable
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $reference2;

    /**
     * @var bool
     */
    protected $complaint = false;

    /**
     * @var bool
     */
    protected $expressProduction = false;

    /**
     * @var bool
     */
    protected $expressShipping = false;

    /**
     * @var Address
     */
    protected $shipper;

    /**
     * @var Address
     */
    protected $recipient;

    /**
     * @var Address|null
     */
    protected $export;

    /**
     * @var ...$files
     */
    protected $files;

    /**
     * @var CustomProperty[]
     */
    protected $customProperties = [];

    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @var bool|null
     */
    protected $fakePreflight = null;

    /**
     * @var bool|null
     */
    protected $fakeShipment = null;

    /**
     * @var string|null
     */
    protected $comment = null;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * @param string $reference2
     */
    public function setReference2($reference2)
    {
        $this->reference2 = $reference2;
    }

    /**
     * @return bool
     */
    public function isComplaint()
    {
        return $this->complaint;
    }

    /**
     * @param bool $complaint
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * @return bool
     */
    public function isExpressProduction()
    {
        return $this->expressProduction;
    }

    /**
     * @param bool $expressProduction
     */
    public function setExpressProduction($expressProduction)
    {
        $this->expressProduction = $expressProduction;
    }

    /**
     * @return bool
     */
    public function isExpressShipping()
    {
        return $this->expressShipping;
    }

    /**
     * @param bool $expressShipping
     */
    public function setExpressShipping($expressShipping)
    {
        $this->expressShipping = $expressShipping;
    }

    /**
     * @return Address
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param Address $shipper
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
    }

    /**
     * @return Address
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param Address $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return Address|null
     */
    public function getExport()
    {
        return $this->export;
    }

    /**
     * @param Address|null $export
     */
    public function setExport($export)
    {
        $this->export = $export;
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
     * @return Callback
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param Callback $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return bool|null
     */
    public function getFakePreflight()
    {
        return $this->fakePreflight;
    }

    /**
     * @param $fakePreflight
     */
    public function setFakePreflight($fakePreflight)
    {
        $this->fakePreflight = $fakePreflight;
    }

    /**
     * @return bool|null
     */
    public function getFakeShipment()
    {
        return $this->fakeShipment;
    }

    /**
     * @param $fakeShipment
     */
    public function setFakeShipment($fakeShipment)
    {
        $this->fakeShipment = $fakeShipment;
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
     * Convert object to array
     *
     * @return array
     * @throws OrderException
     */
    public function toArray(): array
    {
        $files = [];
        /**
         * @var File $file
         */
        if ($this->files) {
            foreach ($this->files as $file) {
                $files[] = $file->toArray();
            }
        }

        $orderArray = [
            'reference'          => $this->reference,
            'reference2'         => $this->reference2,
            'complaint'          => $this->complaint,
            'express_production' => $this->expressProduction,
            'express_shipping'   => $this->expressShipping,
            'shipper'            => $this->shipper->toArray(),
            'recipient'          => $this->recipient->toArray(),
            'export'             => $this->export !== null ? $this->export->toArray() : null,
        ];

        if ($files) {
            $orderArray['files'] = $files;
        }

        $customPropertyArray = [];
        foreach ($this->customProperties as $customProperty) {
            $customPropertyArray[] = $customProperty->toArray();
        }

        if (!empty($customPropertyArray)) {
            $orderArray['custom_properties'] = $customPropertyArray;
        }

        if (!empty($this->callback)) {
            $orderArray['callback'] = $this->callback->toArray();
        }

        if (!is_null($this->fakeShipment)) {
            $orderArray['fake_shipment'] = $this->fakeShipment;
        }

        if (!is_null($this->fakePreflight)) {
            $orderArray['fake_preflight'] = $this->fakePreflight;
        }

        if (!is_null($this->comment)) {
            $orderArray['comment'] = $this->comment;
        }

        return $orderArray;
    }
}
