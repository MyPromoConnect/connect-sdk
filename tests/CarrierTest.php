<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Helpers\CarrierOptions;
use PHPUnit\Framework\TestCase;

class CarrierTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new CarrierOptions();
        $this->options->setFrom(1);
        $this->options->setPerPage(5);
    }

    public function testOptions()
    {
        $this->assertIsArray($this->options->toArray());
    }
}
