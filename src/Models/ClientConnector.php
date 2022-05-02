<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationMagento;
use MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationShopify;

class ClientConnector implements Arrayable
{
    /**
     * @var int
     */
    protected $connector_id;

    /**
     * @var string
     */
    protected $connector_key;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var object
     */
    protected $configuration;

    /**
     * @return int
     */
    public function getConnectorId(): int
    {
        return $this->connector_id;
    }

    /**
     * @param int $connector_id
     */
    public function setConnectorId(int $connector_id)
    {
        $this->connector_id = $connector_id;
    }

    /**
     * @return string
     */
    public function getConnectorKey(): string
    {
        return $this->connector_key;
    }

    /**
     * @param string $connector_key
     */
    public function setConnectorKey(string $connector_key)
    {
        $this->connector_key = $connector_key;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target)
    {
        $this->target = $target;
    }

    /**
     * @return object
     */
    public function getConfiguration(): object
    {
        return $this->configuration;
    }

    /**
     * @param object $configuration
     *
     * e.g.
     * \MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationMagento
     * \MyPromo\Connect\SDK\Helpers\ClientConnectorConfigurationShopify
     * ...
     */
    public function setConfiguration(object $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $clientConnectorArray = [
            'connector_id'  => $this->connector_id,
            'connector_key' => $this->connector_key,
            'target'        => $this->target,
        ];

        if ($this->configuration instanceof \MyPromo\Connect\SDK\Models\ClientConnectorConfigurationShopify) {
            $clientConnectorArray['configuration'] = $this->configuration->toArray();
        }

        if ($this->configuration instanceof \MyPromo\Connect\SDK\Models\ClientConnectorConfigurationMagento) {
            $clientConnectorArray['configuration'] = $this->configuration->toArray();
        }

        return $clientConnectorArray;

    }
}
