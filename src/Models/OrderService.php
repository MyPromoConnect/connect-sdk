<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class OrderService
 * @package Connect\SDK\Models
 */
class OrderService implements Arrayable
{
    /**
     * @var array|null
     */
    protected $services;

    /**
     * @return array|null
     */
    public function getServices(): ?array
    {
        return $this->services;
    }

    /**
     * @param array|null $services
     */
    public function setServices(array $services)
    {
        $this->services = $services;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        $index = 0;
        $servicesArray = [];

        foreach ($this->services as $service) {
            $servicesArray[$index]['service'] = $service;
            $index++;
        }

        return $servicesArray;
    }
}
