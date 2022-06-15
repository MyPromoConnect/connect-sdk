<?php

namespace MyPromo\Connect\SDK\Models\Jobs;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\Jobs\JobFilters;
use MyPromo\Connect\SDK\Models\Callback;

class Job implements Arrayable
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
     * @var JobFilters $filters
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
     * @return JobFilters
     */
    public function getFilters(): JobFilters
    {
        return $this->filters;
    }

    /**
     * @param JobFilters $filters
     */
    public function setFilters(JobFilters $filters)
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
        $resultArray['target'] = $this->target;

        if ($this->filters instanceof \MyPromo\Connect\SDK\Models\Jobs\JobFilters) {
            $resultArray['filters'] = $this->filters->toArray();
        }

        if ($this->callback instanceof \MyPromo\Connect\SDK\Models\Callback) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
