<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\TimezoneException;
use MyPromo\Connect\SDK\Helpers\TimezoneOptions;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class TimezoneRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      pagination
     *
     * You can use the @param array|TimezoneOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws TimezoneException|GuzzleException
     */
    public function all($options): array
    {
        try {
            if ($options instanceof TimezoneOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/timezones', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new TimezoneException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new TimezoneException($ex->getMessage(), $ex->getCode());
        }
    }
}
