<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ClientConnectorOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var bool
     */
    protected $pagination;

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
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

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
    public function getConnectorId(): ?int
    {
        return $this->connector_id;
    }

    /**
     * @param int $connector_id
     */
    public function setConnectorId(?int $connector_id)
    {
        $this->connector_id = $connector_id;
    }

    /**
     * @return string
     */
    public function getConnectorKey(): ?string
    {
        return $this->connector_key;
    }

    /**
     * @param string $connector_key
     */
    public function setConnectorKey(?string $connector_key)
    {
        $this->connector_key = $connector_key;
    }

    /**
     * @return string
     */
    public function getConnectorTarget(): ?string
    {
        return $this->connector_target;
    }

    /**
     * @param string $connector_target
     */
    public function setConnectorTarget(?string $connector_target)
    {
        $this->connector_target = $connector_target;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'page'          => $this->page ? $this->page : 1,
            'per_page'      => $this->per_page,
            'pagination'    => $this->pagination,
            'connector_id'  => $this->connector_id ?? null,
            'connector_key' => $this->connector_key ?? null,
            'target'        => $this->target ?? null,
        ];
    }
}
