<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductExportOptions implements Arrayable
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
    protected $perPage;

    /**
     * @var string
     */
    protected $created_from;

    /**
     * @var string
     */
    protected $created_to;

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;
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
     * @return string
     */
    public function getCreatedFrom(): string
    {
        return $this->created_from;
    }

    /**
     * @param string $created_from
     */
    public function setCreatedFrom(string $created_from)
    {
        $this->created_from = $created_from;
    }

    /**
     * @return string
     */
    public function getCreatedTo(): string
    {
        return $this->created_to;
    }

    /**
     * @param string $created_to
     */
    public function setCreatedTo(string $created_to)
    {
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
            'page'          => $this->page,
            'per_page'      => $this->perPage,
            'pagination'    => $this->pagination,
            'created_from'  => $this->created_from,
            'created_to'    => $this->created_to,
        ];
    }
}
