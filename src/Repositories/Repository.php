<?php

namespace Connect\SDK\Repositories;

use Connect\SDK\Client;

/**
 * Class Repository
 * @package Connect\SDK\Repositories
 */
class Repository
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Repository constructor.
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}
