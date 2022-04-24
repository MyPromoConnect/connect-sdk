<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use DateTimeInterface;
use MyPromo\Connect\SDK\Repositories\ProductionOrders\ProductionOrderRepository;

/**
 * Class ProductionOrderOptions
 * @package Connect\SDK\Helpers
 * Helper class for @see ProductionOrderRepository::all()
 */
class ProductionOrderOptions implements Arrayable
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
        return $this->created_from;
    }

    /**
     * @param DateTimeInterface $created_from
     */
    public function setCreatedFrom($created_from)
    {
        Date::validate($created_from);

        $this->created_from = $created_from;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedTo()
    {
        return $this->created_to;
    }

    /**
     * @param DateTimeInterface $created_to
     */
    public function setCreatedTo($created_to)
    {
        Date::validate($created_to);

        $this->created_to = $created_to;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedFrom()
    {
        return $this->updated_from;
    }

    /**
     * @param DateTimeInterface $updated_from
     */
    public function setUpdatedFrom($updated_from)
    {
        Date::validate($updated_from);

        $this->updated_from = $updated_from;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedTo()
    {
        return $this->updated_to;
    }

    /**
     * @param DateTimeInterface $updated_to
     */
    public function setUpdatedTo($updated_to)
    {
        Date::validate($updated_to);

        $this->updated_to = $updated_to;
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
            'created_from' => $this->created_from ? $this->created_from->format('Y-m-d') : null,
            'created_to'   => $this->created_to ? $this->created_to->format('Y-m-d') : null,
            'updated_from' => $this->updated_from ? $this->updated_from->format('Y-m-d') : null,
            'updated_to'   => $this->updated_to ? $this->updated_to->format('Y-m-d') : null,
        ];
    }
}
