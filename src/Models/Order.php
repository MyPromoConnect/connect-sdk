<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

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
     * @var Address
     */
    protected $invoice;

    /**
     * @var ...$files
     */
    protected $files;

    /**
     * @var CustomProperty[]
     */
    protected $customProperties;

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
     * @return Address
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Address $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
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
    public function getCustomProperties(): array
    {
        return $this->customProperties;
    }

    /**
     * @param CustomProperty[] $customProperties
     */
    public function setCustomProperties(array $customProperties): void
    {
        $this->customProperties = $customProperties;
    }

    /**
     * Convert object to array
     *
     * @return array
     */
    public function toArray()
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
            'complaint'          => $this->complaint,
            'express_production' => $this->expressProduction,
            'express_shipping'   => $this->expressShipping,
            'shipper'            => $this->shipper->toArray(),
            'recipient'          => $this->recipient->toArray(),
            'invoice'            => $this->invoice->toArray(),
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

        return $orderArray;
    }
}
