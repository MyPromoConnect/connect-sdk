<?php

namespace MyPromo\Connect\SDK\Helpers\Configurator;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class CategoriesOptions implements Arrayable
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
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'lang'      => $this->lang,
            'client_id' => $this->client_id,
        ];
    }
}
