<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Repositories\Orders\OrderRepository;
use DateTimeInterface;

/**
 * Class OrderOption
 * @package Connect\SDK\Helpers
 * Helper class for @see OrderRepository::all()
 */
class OrderOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $from;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var DateTimeInterface
     */
    protected $createdFrom;

    /**
     * @var DateTimeInterface
     */
    protected $createdTo;

    /**
     * @var DateTimeInterface
     */
    protected $updatedFrom;

    /**
     * @var DateTimeInterface
     */
    protected $updatedTo;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $reference2;

    /**
     * @var bool
     */
    protected $pagination;

    /**
     * @return bool
     */
    public function getPagination(): bool
    {
        return $this->pagination;
    }

    /**
     * @param bool $pagination
     */
    public function setPagination(bool $pagination)
    {
        $this->pagination = $pagination;
    }

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
     * @return DateTimeInterface
     */
    public function getCreatedFrom()
    {
        return $this->createdFrom;
    }

    /**
     * @param DateTimeInterface $createdFrom
     */
    public function setCreatedFrom($createdFrom)
    {
        Date::validate($createdFrom);

        $this->createdFrom = $createdFrom;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedTo()
    {
        return $this->createdTo;
    }

    /**
     * @param DateTimeInterface $createdTo
     */
    public function setCreatedTo($createdTo)
    {
        Date::validate($createdTo);

        $this->createdTo = $createdTo;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedFrom()
    {
        return $this->updatedFrom;
    }

    /**
     * @param DateTimeInterface $updatedFrom
     */
    public function setUpdatedFrom($updatedFrom)
    {
        Date::validate($updatedFrom);

        $this->updatedFrom = $updatedFrom;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedTo()
    {
        return $this->updatedTo;
    }

    /**
     * @param DateTimeInterface $updatedTo
     */
    public function setUpdatedTo($updatedTo)
    {
        Date::validate($updatedTo);

        $this->updatedTo = $updatedTo;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * @param string $reference2
     */
    public function setReference2($reference2)
    {
        $this->reference2 = $reference2;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'from'         => $this->from,
            'page'         => $this->page,
            'per_page'     => $this->perPage,
            'pagination'   => $this->pagination,
            'created_from' => $this->createdFrom ? $this->createdFrom->format('Y-m-d') : null,
            'created_to'   => $this->createdTo ? $this->createdTo->format('Y-m-d') : null,
            'updated_from' => $this->updatedFrom ? $this->updatedFrom->format('Y-m-d') : null,
            'updated_to'   => $this->updatedTo ? $this->updatedTo->format('Y-m-d') : null,
            'reference'    => $this->reference ? $this->reference : null,
            'reference2'   => $this->reference2 ? $this->reference2 : null,
        ];
    }
}
