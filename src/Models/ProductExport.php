<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use MyPromo\Connect\SDK\Helpers\ProductExportFilterOptions;

class ProductExport implements Arrayable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $template_id;

    /**
     * @var string
     */
    protected $template_key;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var ProductExportFilterOptions $filters
     */
    protected $filters;

    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @return ProductExportFilterOptions
     */
    public function getFilters(): ProductExportFilterOptions
    {
        return $this->filters;
    }

    /**
     * @param ProductExportFilterOptions $filters
     */
    public function setFilters(ProductExportFilterOptions $filters)
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
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getTemplateId(): string
    {
        return $this->template_id;
    }

    /**
     * @param string $template_id
     */
    public function setTempletaId(string $template_id)
    {
        $this->template_id = $template_id;
    }

    /**
     * @return string
     */
    public function getTemplateKey(): string
    {
        return $this->template_key;
    }

    /**
     * @param string $template_key
     */
    public function setTempletaKey(string $template_key)
    {
        $this->template_key = $template_key;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     * @throws OrderException
     */
    public function toArray(): array
    {
        $resultArray = [
            'id'            => $this->id,
            'template_id'   => $this->template_id,
            'template_key'  => $this->template_key,
            'format'        => $this->format,
            'filters'       => $this->filters->toArray(),
        ];

        if (!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
