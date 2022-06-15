<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\Miscellaneous\StateOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class StateRepository extends Repository
{
    /**
     * @param StateOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException|GuzzleException
     */
    public function all(StateOptions $options)
    {
        try {
            if ($options instanceof StateOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/states', [
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
     * @param $stateId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException|GuzzleException
     */
    public function find($stateId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/states/' . $stateId, [
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
