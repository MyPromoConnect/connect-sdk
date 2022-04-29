<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Helpers\CountryOptions;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new CountryOptions();
        $this->options->setPage(1);
        $this->options->setPerPage(5);
        $this->options->setPagination(false);
    }

    public function testOptions()
    {
        $this->assertIsArray($this->options->toArray());
    }
}
