<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ProductImportConfirm implements Arrayable
{
    /**
     * @var string
     */
    protected $execute_date;

    /**
     * @return string
     */
    public function getExecuteDate(): string
    {
        return $this->execute_date;
    }

    /**
     * @param string $execute_date
     */
    public function setExecuteDate(string $execute_date)
    {
        $this->execute_date = $execute_date;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'execute_date' => $this->execute_date,
        ];
    }
}
