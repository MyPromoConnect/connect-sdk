<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Helpers\ConnectorJobFilters;

class ConnectorJob implements Arrayable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var ConnectorJobFilters $filters
     */
    protected $filters;

    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @return Callback
     */
    public function getCallback(): Callback
    {
        return $this->callback;
    }

    /**
     * @param Callback $callback
     */
    public function setCallback(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return ConnectorJobFilters
     */
    public function getFilters(): ConnectorJobFilters
    {
        return $this->filters;
    }

    /**
     * @param ConnectorJobFilters $filters
     */
    public function setFilters(ConnectorJobFilters $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        //$resultArray['id'] = $this->id;
        $resultArray['target'] = $this->target;

        if (!empty($this->filters)) {
            $resultArray['filters'] = $this->filters->toArray();
        }

        if (!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
