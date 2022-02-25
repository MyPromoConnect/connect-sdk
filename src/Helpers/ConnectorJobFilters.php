<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class ConnectorJobFilters
 * @package MyPromo\Connect\SDK\Helpers
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
     * @var string
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
     * @return string
     */
    public function getProducts(): string
    {
        return $this->products;
    }

    /**
     * @param string $products
     */
    public function setProducts(string $products)
    {
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getFulfiller(): string
    {
        return $this->fulfiller;
    }

    /**
     * @param string $fulfiller
     */
    public function setFulfiller(string $fulfiller)
    {
        $this->fulfiller = $fulfiller;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference)
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
     * @return string
     */
    public function getTestProduct(): string
    {
        return $this->test_product;
    }

    /**
     * @param string $test_product
     */
    public function setTestProduct(string $test_product)
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
