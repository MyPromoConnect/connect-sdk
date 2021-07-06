<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class StateOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $from;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param int $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'from'          => $this->from,
            'per_page'      => $this->perPage,
        ];
    }
}
