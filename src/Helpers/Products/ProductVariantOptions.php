<?php

namespace MyPromo\Connect\SDK\Helpers\Products;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductVariantOptions implements Arrayable
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $pagination;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $lang;

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
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku(?string $sku)
    {
        $this->sku = $sku;
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
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;
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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'page'       => $this->page ? $this->page : 1,
            'per_page'   => $this->per_page,
            'pagination' => $this->pagination,
            'lang'       => $this->lang ? $this->lang : null,
        ];

        if (isset($this->id)) {
            $data['id'] = $this->id;
        }

        if (isset($this->reference)) {
            $data['reference'] = $this->reference;
        }

        if (isset($this->sku)) {
            $data['sku'] = $this->sku;
        }

        return $data;
    }
}
