<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class ConnectorJobFilters
 * @package MyPromo\Connect\SDK\Models
 */
class ConnectorJobFilters implements Arrayable
{
    /**
     * @var string
     */
    protected $job;

    /**
     * @var string
     */
    protected $fulfiller;

    /**
     * @var bool
     */
    protected $test_product;

    /**
     * @var string
     */
    protected $products;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var bool
     */
    protected $skip_duplicates;

    /**
     * @return string|null
     */
    public function getProducts(): ?string
    {
        return $this->products;
    }

    /**
     * @param string|null $products
     */
    public function setProducts(?string $products)
    {
        $this->products = $products;
    }

    /**
     * @return string|null
     */
    public function getFulfiller(): ?string
    {
        return $this->fulfiller;
    }

    /**
     * @param string|null $fulfiller
     */
    public function setFulfiller(?string $fulfiller)
    {
        $this->fulfiller = $fulfiller;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return bool
     */
    public function getSkipDuplicates(): bool
    {
        return $this->skip_duplicates;
    }

    /**
     * @param bool $skip_duplicates
     */
    public function setSkipDuplicates(bool $skip_duplicates)
    {
        $this->skip_duplicates = $skip_duplicates;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job)
    {
        $this->job = $job;
    }

    /**
     * @return bool
     */
    public function getTestProduct(): bool
    {
        return $this->test_product;
    }

    /**
     * @param bool $test_product
     */
    public function setTestProduct(bool $test_product)
    {
        $this->test_product = $test_product;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        if (!empty($this->job)) {
            $data['job'] = $this->job;
        }

        if (!empty($this->status)) {
            $data['status'] = $this->status;
        }

        if (!empty($this->reference)) {
            $data['reference'] = $this->reference;
        }

        if (!empty($this->skip_duplicates)) {
            $data['skip-duplicates'] = $this->skip_duplicates;
        }

        if (!empty($this->test_product)) {
            $data['test_product'] = $this->test_product;
        }

        if (!empty($this->fulfiller)) {
            $data['fulfiller'] = $this->fulfiller;
        }

        if (!empty($this->products)) {
            $data['product'] = $this->products;
        }

        return $data;
    }
}
