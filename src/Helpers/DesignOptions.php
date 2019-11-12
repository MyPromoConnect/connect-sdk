<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class DesignOptions
 * @package MyPromo\Connect\SDK\Helpers
 */
class DesignOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'   => $this->id,
            'type' => $this->type,
        ];
    }
}
