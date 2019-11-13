<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class Design
 * @package MyPromo\Connect\SDK\Models
 */
class Design implements Arrayable
{
    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $returnUrl;

    /**
     * @var string
     */
    protected $cancelUrl;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var array|null
     */
    protected $customs;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param string $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @param string $cancelUrl
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
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
     * @return array|null
     */
    public function getCustoms()
    {
        return $this->customs;
    }

    /**
     * @param array $customs
     */
    public function setDraft($customs)
    {
        $this->customs = $customs;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $designArray = [
            'sku'        => $this->sku,
            'return_url' => $this->returnUrl,
            'cancel_url' => $this->cancelUrl,
        ];

        if ($this->customs) {
            $designArray['customs'] = $this->customs;
        }

        return $designArray;
    }

}
