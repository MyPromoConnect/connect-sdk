<?php

namespace MyPromo\Connect\SDK\Helpers\Configurator;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class VariantOptions implements Arrayable
{
    /**
     * @var string
     */
    protected $lang;

    /**
     * @var int
     */
    protected $client_id;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @param string $lang
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param int $client_id
     */
    public function setClientId(int $client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $sku
     */
    public function setSku(?string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(?string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'lang'      => $this->lang,
            'client_id' => $this->client_id,
            'id'        => $this->id ?? null,
            'sku'       => $this->sku ?? null,
            'currency'  => $this->currency ?? null,
        ];
    }
}
