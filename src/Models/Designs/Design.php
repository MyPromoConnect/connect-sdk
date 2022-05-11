<?php

namespace MyPromo\Connect\SDK\Models\Designs;

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
    protected $editorUserHash;

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
     * @var int
     */
    protected $qty;


    /**
     * @var array|null
     */
    protected $options;

    /**
     * @var string
     */
    protected $intent;

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
    public function getEditorUserHash()
    {
        return $this->editorUserHash;
    }

    /**
     * @param string $editorUserHash
     */
    public function setEditorUserHash($editorUserHash)
    {
        $this->editorUserHash = $editorUserHash;
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
     * @return int
     */
    public function getQuantity()
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     */
    public function setQuantity($qty)
    {
        $this->qty = $qty;
    }


    /**
     * @return array|null
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * @param string $intent
     */
    public function setIntent($intent)
    {
        $this->intent = $intent;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $designArray = [
            'editor_user_hash' => $this->editorUserHash,
            'sku'              => $this->sku,
            'qty'              => $this->qty ? $this->qty : 1,
            'intent'           => $this->intent,
            'return_url'       => $this->returnUrl,
            'cancel_url'       => $this->cancelUrl,
        ];

        if ($this->options) {
            $designArray['options'] = $this->options;
        }


        return $designArray;
    }
}