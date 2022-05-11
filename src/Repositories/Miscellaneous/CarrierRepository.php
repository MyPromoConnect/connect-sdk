<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\Miscellaneous\CarrierOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class CarrierRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *
     * You can use the @param array|CarrierOptions $options
     *
     * @return array
     */
    public function all($options)
    {
        try {
            if ($options instanceof CarrierOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/carriers', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options,
            ]);

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $carrierId
     *
     * @return array
     */
    public function find($carrierId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/carriers/' . $carrierId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
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
