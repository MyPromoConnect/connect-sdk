<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\TimezoneOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

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

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
