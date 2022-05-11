<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ConfiguratorCategoriesOptions implements Arrayable
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
     * @var bool
     */
    protected $empty;

    /**
     * @var bool
     */
    protected $hidden;


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
     * @param bool $empty
     */
    public function setEmpty(?bool $empty)
    {
        $this->empty = $empty;
    }

    /**
     * @return bool
     */
    public function getEmpty(): ?bool
    {
        return $this->empty;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(?bool $hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return int
     */
    public function getHidden(): ?bool
    {
        return $this->empty;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'lang'      => $this->lang,
            'client_id' => $this->client_id,
            'empty'     => $this->empty ?? null,
            'hidden'    => $this->hidden ?? null,
        ];
    }
}
