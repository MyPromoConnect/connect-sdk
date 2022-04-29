<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Helpers\TimezoneOptions;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new TimezoneOptions();
        $this->options->setPage(1);
        $this->options->setPerPage(5);
        $this->options->setPagination(false);
    }

    public function testOptions()
    {
        $this->assertIsArray($this->options->toArray());
    }
}
