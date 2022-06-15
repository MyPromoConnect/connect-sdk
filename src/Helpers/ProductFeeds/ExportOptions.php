<?php

namespace MyPromo\Connect\SDK\Helpers\ProductFeeds;

use DateTimeInterface;
use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Helpers\Date;

class ExportOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $pagination;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var DateTimeInterface
     */
    protected $created_from;

    /**
     * @var DateTimeInterface
     */
    protected $created_to;

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage(int $per_page)
    {
        $this->per_page = $per_page;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPagination(): int
    {
        return $this->pagination;
    }

    /**
     * @param int $pagination
     */
    public function setPagination(int $pagination)
    {
        $this->pagination = $pagination;
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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page'         => $this->page ? $this->page : 1,
            'per_page'     => $this->per_page,
            'pagination'   => $this->pagination,
            'created_from' => $this->created_from ? $this->created_from->format('Y-m-d') : null,
            'created_to'   => $this->created_to ? $this->created_to->format('Y-m-d') : null,
        ];
    }
}
