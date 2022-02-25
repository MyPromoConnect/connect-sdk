<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

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
     * @var array
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
     * @return array
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * @param array $configuration
     */
    public function setConfiguration(array $configuration)
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
        return [
            'connector_id'  => $this->connector_id,
            'connector_key' => $this->connector_key,
            'target'        => $this->target,
            'configuration' => $this->configuration,
        ];
    }
}
