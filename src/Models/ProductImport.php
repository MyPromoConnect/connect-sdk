<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Models\ProductImportInput;
use MyPromo\Connect\SDK\Models\Callback;

class ProductImport implements Arrayable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int|null
     */
    protected $template_id;

    /**
     * @var string|null
     */
    protected $template_key;

    /**
     * @var bool
     */
    protected $dryRun;

    /**
     * @var ProductImportInput $input
     */
    protected $input;

    /**
     * @var Callback
     */
    protected $callback;

    /**
     * @var Date Excecute
     */
    protected $date_execute;

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
     * @return ProductImportInput
     */
    public function getInput(): ProductImportInput
    {
        return $this->input;
    }

    /**
     * @param ProductImportInput $input
     */
    public function setInput(ProductImportInput $input)
    {
        $this->input = $input;
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
     * @return string
     */
    public function getDryRun(): string
    {
        return $this->dry_run;
    }

    /**
     * @param bool $dry_run
     */
    public function setDryRun(bool $dry_run)
    {
        $this->dryRun = $dry_run;
    }

    /**
     * @return int
     */
    public function getTemplateId(): int
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
     * @return string
     */
    public function getTemplateKey(): string
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
     * @return string
     */
    public function getDateExecute(): string
    {
        return $this->date_execute;
    }

    /**
     * @param string|null $date_execute
     */
    public function setDateExecute(?string $date_execute)
    {
        $this->date_execute = $date_execute;
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
            'dry_run'      => $this->dryRun,
            'date_execute' => $this->date_execute
        ];

        if ($this->input instanceof \MyPromo\Connect\SDK\Models\ProductImportInput) {
            $resultArray['input'] = $this->input->toArray();
        }

        if ($this->callback instanceof \MyPromo\Connect\SDK\Models\Callback) {
            $resultArray['callback'] = $this->callback->toArray();
        }

        return $resultArray;
    }
}
