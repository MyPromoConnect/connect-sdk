<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Helpers\StateOptions;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new StateOptions();
        $this->options->setFrom(1);
        $this->options->setPerPage(5);
    }

    public function testOptions()
    {
        $this->assertIsArray($this->options->toArray());
    }
}
