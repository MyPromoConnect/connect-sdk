<?php

namespace MyPromo\Connect\SDK\Models\Orders;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\Address;
use MyPromo\Connect\SDK\Models\File;
use MyPromo\Connect\SDK\Models\Callback;

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
     * @var Address|null
     */
    protected $shipper = null;

    /**
     * @var Address
     */
    protected $recipient;

    /**
     * @var Address|null
     */
    protected $export = null;

    /**
     * @var Address|null
     */
    protected $invoice = null;

    /**
     * @var File|null
     */
    protected $files = null;

    /**
     * @var CustomProperty|null
     */
    protected $customProperties = null;

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
    public function getShipper(): ?Address
    {
        return $this->shipper;
    }

    /**
     * @param Address $shipper
     */
    public function setShipper(?Address $shipper)
    {
        $this->shipper = $shipper;
    }

    /**
     * @return Address
     */
    public function getRecipient(): Address
    {
        return $this->recipient;
    }

    /**
     * @param Address $recipient
     */
    public function setRecipient(Address $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return Address|null
     */
    public function getExport(): ?Address
    {
        return $this->export;
    }

    /**
     * @param Address|null $export
     */
    public function setExport(?Address $export)
    {
        $this->export = $export;
    }

    /**
     * @return Address|null
     */
    public function getInvoice(): ?Address
    {
        return $this->invoice;
    }

    /**
     * @param Address|null $invoice
     */
    public function setInvoice(?Address $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return File
     */
    public function getFiles(): ?File
    {
        return $this->files;
    }

    /**
     * @param File
     */
    public function setFiles(?File $files)
    {
        $this->files = $files;
    }

    /**
     * @return CustomProperty
     */
    public function getCustomProperties(): ?CustomProperty
    {
        return $this->customProperties;
    }

    /**
     * @param CustomProperty $customProperties
     */
    public function setCustomProperties(?CustomProperty $customProperties)
    {
        $this->customProperties = $customProperties;
    }

    /**
     * @return Callback|null
     */
    public function getCallback(): ?Callback
    {
        return $this->callback;
    }

    /**
     * @param Callback
     */
    public function setCallback(?Callback $callback)
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
            'shipper'            => $this->shipper !== null ? $this->shipper->toArray() : null,
            'recipient'          => $this->recipient->toArray(),
            'export'             => $this->export !== null ? $this->export->toArray() : null,
            'invoice'            => $this->invoice !== null ? $this->invoice->toArray() : null,
        ];

        if ($files) {
            $orderArray['files'] = $files;
        }

        $customPropertyArray = [];
        if ($this->customProperties) {
            foreach ($this->customProperties as $customProperty) {
                $customPropertyArray[] = $customProperty->toArray();
            }
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
