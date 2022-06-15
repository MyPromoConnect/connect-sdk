<?php

namespace MyPromo\Connect\SDK\Models\ProductFeeds;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\ProductFeeds\ExportFilters;
use MyPromo\Connect\SDK\Models\Callback;

class Export implements Arrayable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int | null
     */
    protected $template_id;

    /**
     * @var string | null
     */
    protected $template_key;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var ExportFilters $filters
     */
    protected $filters;

    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @return ExportFilters
     */
    public function getFilters(): ExportFilters
    {
        return $this->filters;
    }

    /**
     * @param ExportFilters $filters
     */
    public function setFilters(ExportFilters $filters)
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
     * @return int|null
     */
    public function getTemplateId(): ?int
    {
        return $this->template_id;
    }

    /**
     * @param int|null $template_id
     */
    public function setTempletaId(?int $template_id)
    {
        $this->template_id = $template_id;
    }

    /**
     * @return string|null
     */
    public function getTemplateKey(): ?string
    {
        return $this->template_key;
    }

    /**
     * @param string|null $template_key
     */
    public function setTempletaKey(?string $template_key)
    {
        $this->template_key = $template_key;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $resultArray = [
            'id'           => $this->id,
            'template_id'  => $this->template_id,
            'template_key' => $this->template_key,
            'format'       => $this->format
        ];

        if (!empty($this->filters)) {
            $resultArray['filters'] = $this->filters->toArray();
        }

        if (!empty($this->callback)) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
