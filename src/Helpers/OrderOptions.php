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
    protected $created_from;

    /**
     * @var DateTimeInterface
     */
    protected $created_to;

    /**
     * @var DateTimeInterface
     */
    protected $updated_from;

    /**
     * @var DateTimeInterface
     */
    protected $updated_to;

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
    public function getcreated_from()
    {
        return $this->created_from;
    }

    /**
     * @param DateTimeInterface $created_from
     */
    public function setcreated_from($created_from)
    {
        Date::validate($created_from);

        $this->created_from = $created_from;
    }

    /**
     * @return DateTimeInterface
     */
    public function getcreated_to()
    {
        return $this->created_to;
    }

    /**
     * @param DateTimeInterface $created_to
     */
    public function setcreated_to($created_to)
    {
        Date::validate($created_to);

        $this->created_to = $created_to;
    }

    /**
     * @return DateTimeInterface
     */
    public function getupdated_from()
    {
        return $this->updated_from;
    }

    /**
     * @param DateTimeInterface $updated_from
     */
    public function setupdated_from($updated_from)
    {
        Date::validate($updated_from);

        $this->updated_from = $updated_from;
    }

    /**
     * @return DateTimeInterface
     */
    public function getupdated_to()
    {
        return $this->updated_to;
    }

    /**
     * @param DateTimeInterface $updated_to
     */
    public function setupdated_to($updated_to)
    {
        Date::validate($updated_to);

        $this->updated_to = $updated_to;
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
            'from' => $this->from,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'pagination' => $this->pagination,
            'created_from' => $this->created_from ? $this->created_from->format('Y-m-d') : null,
            'created_to' => $this->created_to ? $this->created_to->format('Y-m-d') : null,
            'updated_from' => $this->updated_from ? $this->updated_from->format('Y-m-d') : null,
            'updated_to' => $this->updated_to ? $this->updated_to->format('Y-m-d') : null,
            'reference' => $this->reference ? $this->reference : null,
            'reference2' => $this->reference2 ? $this->reference2 : null,
        ];
    }
}
